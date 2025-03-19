<?php
namespace App\Services;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    protected $asaasApiUrl;
    protected $asaasApiKey;

    public function __construct()
    {
        $this->asaasApiUrl = env('ASAAS_API_URL', 'https://www.asaas.com/api/v3');
        $this->asaasApiKey = env('ASAAS_API_KEY');
    }

    public function processPayment($customerData, $products, $paymentType, $plan, $cardData = null)
    {
        try {
            $customer = $this->createOrGetCustomer($customerData);

            $subscription = Subscription::create([
                'customer_id' => $customer->id,
                'plan_id' => $plan['id'],
                'billing_type' => $paymentType,
                'status' => 'active',
                'next_due_date' => now()->addDays($plan['interval_days']),
            ]);

            if ($paymentType === 'CARTAO') {
                return $this->createCardSubscription($customer, $plan, $cardData, $subscription);
            }

            if (in_array($paymentType, ['PIX', 'BOLETO'])) {
                return $this->createSinglePayment($customer, $plan, $paymentType, $subscription);
            }

            return ['error' => 'Método de pagamento inválido'];
        } catch (\Exception $e) {
            Log::error('Erro ao processar pagamento: ' . $e->getMessage());
            return ['error' => 'Erro ao processar pagamento'];
        }
    }

    private function createOrGetCustomer($customerData)
    {
        $customer = Customer::firstOrCreate(
            ['email' => $customerData['email']],
            [
                'name' => $customerData['name'],
                'phone' => $customerData['phone']
            ]
        );

        if ($customer->id_customer_asaas) {
            return $customer;
        }

        $response = Http::withHeaders([
            'access_token' => $this->asaasApiKey
        ])->post("$this->asaasApiUrl/customers", [
            'name' => $customerData['name'],
            'email' => $customerData['email'],
            'phone' => $customerData['phone']
        ]);

        if ($response->failed()) {
            throw new \Exception('Erro ao criar cliente no Asaas');
        }

        $customer->update(['id_customer_asaas' => $response['id']]);
        return $customer;
    }

    private function createCardSubscription($customer, $plan, $cardData, $subscription)
    {
        $response = Http::withHeaders([
            'access_token' => $this->asaasApiKey
        ])->post("$this->asaasApiUrl/subscriptions", [
            'customer' => $customer->asaas_id,
            'billingType' => 'CREDIT_CARD',
            'value' => $plan['price'],
            'nextDueDate' => now()->format('Y-m-d'),
            'cycle' => 'MONTHLY',
            'creditCard' => [
                'holderName' => $cardData['holder_name'],
                'number' => $cardData['number'],
                'expiryMonth' => $cardData['expiry_month'],
                'expiryYear' => $cardData['expiry_year'],
                'cvv' => $cardData['cvv']
            ]
        ]);

        if ($response->failed()) {
            throw new \Exception('Erro ao criar assinatura com cartão');
        }

        $subscription->update(['transaction_id' => $response['id']]);

        $invoice = Invoice::create([
            'subscription_id' => $subscription->id,
            'due_date' => now()->addDays(30), // Exemplo: data de vencimento em 30 dias
            'amount' => $plan['price'],
            'status' => 'pending', // Inicialmente pendente
            'asaas_invoice_id' => $response['id'], // ID da fatura no Asaas
            'checkout_url' => $response['paymentLink'], // URL do checkout com cartão de crédito
        ]);

        return [
            'success' => true,
            'message' => 'Assinatura e fatura criadas com sucesso!',
            'subscription_id' => $response['id'],
            'invoice_id' => $invoice->id,
            'checkout_url' => $response['paymentLink'] // URL do checkout
        ];
    }

    private function createSinglePayment($customer, $plan, $paymentType, $subscription)
    {
        $response = Http::withHeaders([
            'access_token' => $this->asaasApiKey
        ])->post("$this->asaasApiUrl/payments", [
            'customer' => $customer->asaas_id,
            'billingType' => $paymentType,
            'value' => $plan['price'],
            'dueDate' => now()->format('Y-m-d')
        ]);

        if ($response->failed()) {
            throw new \Exception('Erro ao criar pagamento único');
        }

        $payment = Payment::create([
            'subscription_id' => $subscription->id,
            'amount' => $plan['price'],
            'payment_method' => $paymentType,
            'status' => 'pending',
            'transaction_id' => $response['id'],
            'due_date' => now()
        ]);

        $invoice = Invoice::create([
            'subscription_id' => $subscription->id,
            'due_date' => now()->addDays(30), // Exemplo: data de vencimento em 30 dias
            'amount' => $plan['price'],
            'status' => 'pending', // Inicialmente pendente
            'asaas_invoice_id' => $response['id'], // ID da fatura no Asaas
            'pix_code' => $paymentType === 'PIX' ? $response['pixCode'] : null,
            'pix_qr_code' => $paymentType === 'PIX' ? $response['pixQrCode'] : null,
            'boleto_url' => $paymentType === 'BOLETO' ? $response['bankSlipUrl'] : null,
            'checkout_url' => $paymentType === 'CARTAO' ? $response['paymentLink'] : null
        ]);

        return [
            'success' => true,
            'message' => 'Pagamento e fatura criados com sucesso!',
            'payment_id' => $payment->id,
            'payment_url' => $paymentType === 'PIX' ? $response['pixQrCode'] : $response['bankSlipUrl'],
            'invoice_id' => $invoice->id
        ];
    }
}
