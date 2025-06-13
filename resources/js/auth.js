document.addEventListener('DOMContentLoaded', () => {
    let isLogin = true;

    const authTitle = document.getElementById('authTitle');
    const authSubtitle = document.getElementById('authSubtitle');
    const toggleText = document.getElementById('toggleText');
    const toggleBtn = document.getElementById('toggleBtn');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const loginExtras = document.getElementById('loginExtras');
    const registerExtras = document.getElementById('registerExtras');
    const mainDiv = document.querySelector('main');
    function toggleForms() {
        if (isLogin) {
            authTitle.textContent = 'Iniciar Sesión';
            authSubtitle.textContent = 'Accede a tu registro de videojuegos';
            toggleText.textContent = '¿No tienes cuenta?';
            toggleBtn.textContent = 'Crear cuenta';
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
            loginExtras.classList.remove('hidden');
            registerExtras.classList.add('hidden');
        } else {
            let errorAlertDiv = document.getElementById('mainErrorAlertDiv');
            errorAlertDiv?.classList.add('hidden');
            authTitle.textContent = 'Crear Cuenta';
            authSubtitle.textContent = 'Únete a la comunidad';
            toggleText.textContent = '¿Ya tienes cuenta?';
            toggleBtn.textContent = 'Iniciar sesión';
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
            loginExtras.classList.add('hidden');
            registerExtras.classList.remove('hidden');
        }
    }

    toggleForms(); // Estado inicial

    toggleBtn.addEventListener('click', () => {
        isLogin = !isLogin;
        toggleForms();
    });

    if (mainDiv.dataset.formType === 'register') {
        toggleBtn.click();
    }
});
