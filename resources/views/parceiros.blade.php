<x-guestLayout>
    <x-header/>
    <div class="container relative flex flex-col justify-between h-full max-w-6xl px-10 mx-auto xl:px-0 mt-5">
        <h2 class="flex justify-center mb-1 text-3xl font-extrabold leading-tight text-gray-900">Parceiros</h2><br>
        <div class="w-full">
            <div class="flex flex-col space-y-5">

                <!-- Caixa do Parceiro 1 -->
                <div class="flex items-start space-x-5">
                    <div class="relative w-1/3 h-40"> <!-- Aumentada a altura aqui -->
                        <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded-lg"></span>
                        <div class="relative h-full p-5 bg-white border-2 rounded-lg" style="background-image: url('images/Elmalogo.png'); background-size: contain; background-repeat: no-repeat; background-position: center;">
                        </div>
                    </div>
                    <div class="w-2/3 p-5 bg-gray-100 border border-gray-300 rounded-lg">
                        <h3 class="text-lg font-bold text-red-600">ELMA</h3>
                        <p>Especialistas em limpeza por ultrassons e vapor. <br>
                        Equipamentos de laboratório e industriais.</p>
                    </div>
                </div>

                <!-- Caixa do Parceiro 2 -->
                <div class="flex items-start space-x-5">
                    <div class="relative w-1/3 h-40"> <!-- Aumentada a altura aqui -->
                        <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded-lg"></span>
                        <div class="relative h-full p-5 bg-white border-2 rounded-lg" style="background-image: url('images/Oteclogo.png'); background-size: contain; background-repeat: no-repeat; background-position: center;">
                        </div>
                    </div>
                    <div class="w-2/3 p-5 bg-gray-100 border border-gray-300 rounded-lg">
                        <h3 class="text-lg font-bold">OTEC</h3>
                        <p>Aplicações várias como peças de precisão CNC Ourivesaria, Bijuteria e relojoaria, polimentos de precisão, sistemas de rebarbamento, polimento e acabamento de alta precisão.</p>
                    </div>
                </div>

                <!-- Caixa do Parceiro 3 -->
                <div class="flex items-start space-x-5">
                    <div class="relative w-1/3 h-40"> <!-- Aumentada a altura aqui -->
                        <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded-lg"></span>
                        <div class="relative h-full p-5 bg-white border-2 rounded-lg" style="background-image: url('images/Radwaglogo.png'); background-size: contain; background-repeat: no-repeat; background-position: center;">
                        </div>
                    </div>
                    <div class="w-2/3 p-5 bg-gray-100 border border-gray-300 rounded-lg">
                        <h3 class="text-lg font-bold">RADWAG</h3>
                        <p>No topo da inovação em soluções de pesagem, desde balança comercial à micro balança para laboratório, e equipamentos verificáveis e aprovados pela metrologia legal.</p>
                    </div>
                </div>

                <!-- Adicione mais parceiros conforme necessário -->
                
            </div>
        </div>
    </div>
    <x-footer/>
</x-guestLayout>