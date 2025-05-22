<footer class="mt-20 flex flex-col lg:flex-row justify-between items-start px-6 py-12 bg-gray-900 text-white space-y-10 lg:space-y-0">
    <!-- Section 1: Company Info -->
    <div class="w-full lg:w-1/3 text-left">
        <h4 class="text-lg font-semibold text-gray-300 mb-2">TargetTools</h4>
        <div class="w-16 h-1 bg-red-500 mb-4"></div>
        <ul class="space-y-2 text-sm">
            <li><a href="/sobre" class="text-gray-400 hover:text-red-500 transition">Sobre Nós</a></li>
            <li><a href="/termos-e-condicoes" class="text-gray-400 hover:text-red-500 transition">Termos & Condições</a></li>
            <li><a href="/politica-de-privacidade" class="text-gray-400 hover:text-red-500 transition">Política de Privacidade</a></li>
            <li><a href="/contactos" class="text-gray-400 hover:text-red-500 transition">Contactos</a></li>
        </ul>
    </div>

    <!-- Section 2: Social Media Links -->
    <div class="w-full lg:w-1/3 flex justify-center lg:justify-end space-x-8 text-gray-300 mt-10 lg:mt-0">
        <a href="https://www.facebook.com/profile.php?id=61551537224728" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="hover:text-red-600 transition duration-300">
            <img src="https://img.icons8.com/fluent/30/000000/facebook-new.png" alt="Facebook" />
        </a>
        <a href="https://www.linkedin.com/in/targettools/?originalSubdomain=pt" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" class="hover:text-red-600 transition duration-300">
            <img src="https://img.icons8.com/fluent/30/000000/linkedin-2.png" alt="LinkedIn" />
        </a>
        <a href="https://www.instagram.com/nunorocha_targettools/" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="hover:text-red-600 transition duration-300">
            <img src="https://img.icons8.com/fluent/30/000000/instagram-new.png" alt="Instagram" />
        </a>
    </div>

    <!-- Section 3: Newsletter Subscription -->
    <div class="w-full lg:w-1/3 text-center mt-10 lg:mt-0">
        <h3 class="font-manrope font-semibold text-3xl lg:text-4xl text-gray-100 mb-6">Inscreva-se na NewsLetter</h3> 
        <form action="/newsletter/subscribe" method="POST" class="relative w-full max-w-md mx-auto">
            <input 
                type="email" 
                name="email" 
                required
                class="w-full py-4 px-6 pr-28 bg-gray-800 text-gray-100 placeholder:text-gray-400 rounded-full focus:outline-none focus:ring-2 focus:ring-red-500"
                placeholder="Digite seu E-mail" />
            <button 
                type="submit"
                class="absolute inset-y-0 right-0 mr-2 my-1 px-6 bg-red-600 text-white font-semibold rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                Subscrever
            </button>
        </form>
    </div>
    
    <!-- Footer Copyright -->
    <div class="w-full text-center mt-8 text-gray-400 text-sm lg:col-span-3">
        &copy; 2025 Target Tools Unpredictable Target, Unip. Lda. Todos os direitos reservados.
    </div>
</footer>
