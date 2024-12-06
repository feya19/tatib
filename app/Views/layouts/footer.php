
        </div>
        </div>
    </div>
    <script src="/assets/js/extended.js"></script>
    <script>
        function logout() {
            swalBootstrap.fire({
                title: "Apakah anda yakin ingin logout?",
                icon: 'warning',
                showCancelButton: true,
                reverseButtons: true,
                confirmButtonText: "Ya, logout dari aplikasi",
                cancelButtonText: "Tidak, batal",
                
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
            });
        }

        $(document).ready(function () {
            const $verifikasiSubmenu = $('#verifikasiSubmenu');
            const $chevronIcon = $('.rotate-icon[data-parent="verifikasiSubmenu"]');
            // Initial angle
            let angle = 0;

            $verifikasiSubmenu.on('show.bs.collapse', function () {
                angle += 180;
                $chevronIcon.animate({ deg: angle }, {
                    step: function (now) {
                        $(this).css({ transform: `rotate(${now}deg)` });
                    },
                    duration: 300
                });
            });

            $verifikasiSubmenu.on('hide.bs.collapse', function () {
                angle -= 180;
                $chevronIcon.animate({ deg: angle }, {
                    step: function (now) {
                        $(this).css({ transform: `rotate(${now}deg)` });
                    },
                    duration: 300
                });
            });
        });

        const flashdata = <?= json_encode(Core\Session::getFlash() ?: []); ?>;
        
        Object.entries(flashdata).forEach(([key, val]) => {
            switch (key) {
                case 'success':
                    toastr.success(val);
                    break;
                case 'error':
                    toastr.error(val);
                    break;
                case 'warning':
                    toastr.warning(val);
                    break;
                default:
                    toastr.info(val);
                    break;
            }
        });
    </script>
</body>
</html>