<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h4 class="text-white">LAPOR !</h4>
                    </div>
                    <ul class="header-links list-reset m-0">
                        <li>
                            <a href="#">Login</a>
                        </li>
                        <li>
                            <a class="button button-sm button-shadow" href="#">Signup</a>
                        </li>
                        <?php if ($this->session->userdata('username')) { ?>
                            <li>
                                <a href="<?= base_url('auth/logout')?>">logout</a>
                            </li>
                            <li>
                                <a href="#">halooo <?php echo $this->session->userdata('username'); ?></a>
                            </li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </header>

