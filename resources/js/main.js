document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('userMenuButton');
    const dropdown = document.getElementById('userMenuDropdown');
    const wrapper = document.getElementById('userMenuWrapper');
    const input = document.getElementById('search-bar');
    const resultBox = document.getElementById('search-result');
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    let timeout = null;
    let isOpen = false;

    menuBtn?.addEventListener('click', (e) => {
        e.stopPropagation();
        isOpen = !isOpen;
        toggleDropdown();
    });

    document.addEventListener('click', (e) => {
        if (!wrapper?.contains(e.target)) {
            isOpen = false;
            toggleDropdown();
        }
        if (!input.contains(e.target) && !resultBox.contains(e.target)) {
            resultBox.classList.add('hidden');
        }
    });
    input?.addEventListener('input', function () {
        clearTimeout(timeout);
        const query = this.value.trim();

        if (query.length < 3) {
            resultBox.classList.add('hidden');
            return;
        }

        timeout = setTimeout(() => {
            fetch(input.dataset.route, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ name: query })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.error) {
                        resultBox.innerHTML = `<div class="p-4 text-sm">No se encontró el juego</div>`;
                    } else {
                        const g = data.game;
                        resultBox.innerHTML = `
                        <div class="p-4">
                            <div class="flex gap-4">
                                ${g.cover_url ? `<img src="${g.cover_url}" alt="${g.name}" class="w-16 h-16 object-cover rounded-md">` : ''}
                                <div>
                                    <h3 class="font-semibold text-lg">${g.name}</h3>
                                    <p class="text-sm opacity-80">Lanzamiento: ${g.release_date || 'N/A'}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    }

                    resultBox.classList.remove('hidden');
                });
        }, 500);
    });
    function toggleDropdown() {
        if (isOpen) {
            dropdown?.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
            dropdown?.classList.add('opacity-100', 'scale-100');
        } else {
            dropdown?.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            dropdown?.classList.remove('opacity-100', 'scale-100');
        }
    }
});
