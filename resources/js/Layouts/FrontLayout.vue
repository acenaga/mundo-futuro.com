<template>
    <div>
        <!-- Header section -->
        <header class="header-section">
            <div class="header-warp">
                <div class="header-social d-flex justify-content-end">
                    <p>Follow us:</p>
                    <a href="https://www.instagram.com/mundofuturoca/" target="__blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.facebook.com/mundofuturoca" target="__blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/mundofuturoca" target="__blank"><i class="fa fa-twitter"></i></a>
                </div>
                <div class="header-bar-warp d-flex">
                    <!-- site logo -->
                    <a href="#" class="site-logo">
                        <img src="http://mundo-futuro.com.test/front-assets/img/logo.png" alt="">
                    </a>
                    <nav class="top-nav-area w-100">
                        <div class="user-panel">
                            <a href="#">Login</a> / <a href="#">Register</a>
                        </div>
                        <!-- Menu -->
                        <ul class="main-menu primary-menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Games</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Game Singel</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Reviews</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        
    <!-- Page Content -->
    <main>
        <slot></slot>
    </main>
        
    </div>
</template>

<script>
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetBanner from '@/Jetstream/Banner'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },

            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
