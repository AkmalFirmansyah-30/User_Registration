<div id="layoutAuthentication_footer">
    <footer class="py-4 mt-auto footer-custom">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                
                <div class="text-muted">
                    &copy; <?php echo date('Y');?> <strong>Sistem Manajemen User</strong>. All Rights Reserved.
                </div>
                
                <div class="text-muted">
                    Dibuat dengan <i class="fas fa-heart text-danger heart-beat mx-1"></i> dan Kopi
                    &middot;
                    <a href="#" class="footer-link ms-1">Privacy Policy</a>
                    &middot;
                    <a href="#" class="footer-link">Terms & Conditions</a>
                </div>
                
            </div>
        </div>
    </footer>

    <style>
        .footer-custom {
            background-color: rgba(255, 255, 255, 0.7); /* Semi transparan */
            backdrop-filter: blur(5px); /* Efek kaca buram */
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        /* Animasi Jantung Berdenyut */
        .heart-beat {
            animation: heartbeat 1.5s infinite;
            display: inline-block;
        }

        @keyframes heartbeat {
            0% { transform: scale(1); }
            10% { transform: scale(1.3); }
            20% { transform: scale(1); }
            30% { transform: scale(1.3); }
            40% { transform: scale(1); }
            100% { transform: scale(1); }
        }

        /* Styling Link Footer */
        .footer-link {
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: #764ba2; /* Warna ungu sesuai tema */
            text-decoration: underline;
        }
    </style>
</div>