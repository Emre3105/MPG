<header>
    <nav class="
        flex flex-wrap items-center justify-between
        w-full bg-gray-light
        py-4 px-4 md:py-0
        text-lg"
    >
        <div><a href="{{ route('home') }}">Logo</a></div>
        <svg
            xmlns="http://www.w3.org/2000/svg"
            id="menu-button"
            class="h-6 w-6 cursor-pointer md:hidden block"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
            />
        </svg>
        <div class="hidden w-full md:flex md:items-center md:w-auto" id="menu">
            <ul class="
                pt-4 md:pt-0
                text-base
                md:flex md:justify-between"
            >
                <li>
                    <a class="md:p-4 py-2 block hover:text-gray-darkest" href="{{ route('home') }}">Accueil</a>
                </li>
                <li>
                    <a class="md:p-4 py-2 block hover:text-gray-darkest" href="{{ route('auth.logout') }}">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<script>
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');
    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>