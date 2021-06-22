<section class="lgn">
        <div class="login-box">
            <h4>LOGIN</h4>
            <hr />
            <form method="POST" name="formLogin" action="<?= base_url('index.php/login/aksi_login') ?>" onsubmit="return validateForm()">
                <input class="input" name="username" class="username" type="text" placeholder="Masukkan Username" />
                <input class="input" name="pass" class="password" type="password" placeholder="Masukkan Password" />
                <input class="btn-primary tombol" type="submit" value="Login" />
            </form>
        </div>
    </section>
    <script>
        function validateForm() {
            if (document.forms["formLogin"]["username"].value == "") {
                alert("Username Tidak Boleh Kosong");
                document.forms["formLogin"]["username"].focus();
                return false;
            }
            if (document.forms["formLogin"]["pass"].value == "") {
                alert("Password Tidak Boleh Kosong");
                document.forms["formLogin"]["pass"].focus();
                return false;
            }
        }
    </script>