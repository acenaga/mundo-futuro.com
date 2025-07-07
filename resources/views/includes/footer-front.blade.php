<footer id="footer-front" class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 px-3">
                <figure>
                    <img class="w-100 logo-footer" src="{{ asset('assets/img/mf-logo-footer.svg') }}" alt="Mundo Futuro">
                </figure>
                <div class="text-primary-brown">
                    <p class="">¡En Mundo Futuro, te traemos el código del mañana, hoy! Donde aprender es tan divertido como encontrar un punto y coma perdido en tu código. Únete a nuestra comunidad y prepárate para el viaje más emocionante en el mundo del desarrollo web. ¡No te pierdas ni un byte!</p>
                    <p class="d-none">En Mundo Futuro, construimos el mañana, un código a la vez. Únete a nuestra tribu de desarrolladores y descubre el poder del conocimiento compartido.</p>
                    <p class="d-none">Mundo Futuro: donde el código es poesía y los errores son solo oportunidades para aprender. ¡Únete a nuestra comunidad y conviértete en el arquitecto de la web del futuro!</p>
                    <p class="d-none" >Explora el futuro del desarrollo web con Mundo Futuro: donde las líneas de código se entrelazan con la innovación y el humor. ¡Ven y únete a la revolución digital!</p>
                    <p class="d-none">En Mundo Futuro, transformamos el código en sonrisas y los errores en lecciones. Únete a nuestra familia de desarrolladores y navega hacia un futuro digital brillante y lleno de posibilidades.</p>
                </div>
                <div class="text-primary-brown">
                    <p class="h3">Powered by:</p>
                    <ul class="lh-lg">
                        <li><a href="http://" target="_blank" rel="noopener noreferrer"><i class="text-primary-blue fs-5 fa-brands fa-laravel"></i></a> Laravel: The PHP Framework For Web Artisans (Ver. {{ app()::VERSION }})</li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer"><i class="text-primary-blue fs-5 fa-brands fa-php"></i></a> PHP (Ver. {{ phpversion() }})</li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer"><i class="text-primary-blue fs-5 fa-brands fa-digital-ocean"></i></a> Digital Ocean</li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-7 px-3">
                <p class="text-primary-brown">¡No te pierdas ni un byte! Únete a nuestro newsletter y sé el primero en enterarte de las últimas noticias, tutoriales y cursos del mundo del desarrollo web. ¡Suscríbete ahora y construye el futuro junto a nosotros!</p>
                <livewire:form-newsletter/>
                <div class="d-flex justify-content-evenly py-4">
                    <a href="https://twitter.com/mundofuturoca" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter fs-3 text-primary-blue"></i></a>
                    <a href="https://www.instagram.com/mundofuturoca/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram fs-3 text-primary-blue"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
