@if($document['status'] === 'not_env' )
                                            <form action="{{ route('documents.store', [$document['document_type']->id, $user]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file" class="mb-2">
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Enviar</button>
                                            </form>
                                        @else
                                        <p class="text-gray-600 dark:text-gray-400">
                                            @if($document['status'] == 1)
                                                <span class="text-yellow-500">Aguardando aprovação</span>
                                            @elseif($document['status'] == 2)
                                                <span class="text-green-500">Aprovado</span>
                                            @elseif($document['status'] == 3)
                                                <span class="text-red-500">Reprovado</span>
                                            @endif
                                        </p>
                                        <a href="{{ route('documents.download', $document['id']) }}" class="text-blue-500 hover:underline">Baixar Documento</a>
                                    @endif