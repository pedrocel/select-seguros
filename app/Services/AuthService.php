<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Institution;
use App\Models\PerfilModel;
use App\Models\Phone;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserPerfilModel;
use App\Models\UserPhone;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthService
{
    /**
     * Registra um novo usuário e gera o token.
     *
     * @param array $data
     * @return array
     */
    public function register(array $data)
    {
        $user = $this->createUser($data);
        $token = JWTAuth::fromUser($user);

        $phones = $this->createPhones($data['phones'] ?? [], $user->id);
        $profile = $this->createProfile($data['profile_id'] ?? null, $user->id);
        $institution = $this->createInstitution($data['id_instituicao'] ?? null, $user->id);
        $addresses = $this->createAddresses($data['addresses'] ?? [], $user->id);

        return [
            'user' => $user,
            'token' => $token,
            'phones' => $phones,
            'profile' => $profile,
            'institution' => $institution,
            'addresses' => $addresses,
        ];
    }

    /**
     * Cria um novo usuário.
     *
     * @param array $data
     * @return \App\Models\User
     */
    private function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'email_aux' => $data['email_aux'],
            'facial_image_base64' => $data['facial_image_base64'],
            'birthdate' => $data['birthdate'],
            'status' => $data['status'],
            'emancipated' => $data['emancipated'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Cria telefones para o usuário.
     *
     * @param array $phones
     * @param int $userId
     * @return array
     */
    private function createPhones(array $phones, int $userId)
    {
        $createdPhones = [];
        foreach ($phones as $phoneNumber) {
            $phone = Phone::create([
                'phone_number' => $phoneNumber,
                'status' => 1,
            ]);

            UserPhone::create([
                'id_user' => $userId,
                'id_phone' => $phone->id,
                'status' => 1,
            ]);

            $createdPhones[] = $phone;
        }
        return $createdPhones;
    }

    /**
     * Cria o perfil do usuário.
     *
     * @param int|null $profileId
     * @param int $userId
     * @return \App\Models\Profile|null
     */
    private function createProfile(?int $profileId, int $userId)
    {
        if (!$profileId) return null;

        UserPerfilModel::create([
            'id_user' => $userId,
            'id_profile' => $profileId,
            'in_use' => 1,
            'status' => 1,
        ]);

        return PerfilModel::find($profileId);
    }

    /**
     * Cria a instituição para o usuário.
     *
     * @param int|null $institutionId
     * @param int $userId
     * @return \App\Models\Institution|null
     */
    private function createInstitution(?int $institutionId, int $userId)
    {
        if (!$institutionId) return null;

        Institution::find($institutionId)->users()->attach($userId, ['status' => 1]);
        return Institution::find($institutionId);
    }

    /**
     * Cria endereços para o usuário.
     *
     * @param array $addresses
     * @param int $userId
     * @return array
     */
    private function createAddresses(array $addresses, int $userId)
    {
        $createdAddresses = [];
        foreach ($addresses as $addressData) {
            $address = Address::create($addressData);
            UserAddress::create([
                'id_user' => $userId,
                'id_address' => $address->id,
                'status' => 1,
            ]);
            $createdAddresses[] = $address;
        }
        return $createdAddresses;
    }

    /**
     * Realiza login e gera o token JWT.
     *
     * @param array $credentials
     * @return string|null
     */
    public function login(array $credentials)
    {
        if (!$token = JWTAuth::attempt($credentials)) {
            return null;
        }
        return $token;
    }

    /**
     * Retorna o usuário autenticado.
     *
     * @return \App\Models\User|null
     */
    public function getAuthenticatedUser()
    {
        return Auth::user();
    }

    /**
     * Realiza logout do usuário.
     *
     * @return void
     */
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }

    /**
     * Gera um novo token.
     *
     * @return string
     */
    public function refresh()
    {
        return JWTAuth::refresh();
    }
}
