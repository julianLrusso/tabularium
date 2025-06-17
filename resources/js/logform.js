import {timeout} from "@/main.js";
import {searchGame} from "@/main.js";
document.addEventListener('DOMContentLoaded', () => {
    const gameNameInput = document.getElementById('add_log_modal_game_name');
    const gameIdInput = document.getElementById('add_log_modal_game_id');
    const searchResult = document.getElementById('create_log_result');
    const modal = document.getElementById('create-log-modal');
    const select = document.getElementById('add_log_modal_platform');

    gameNameInput?.addEventListener('input', function () {
        searchGame(gameNameInput, searchResult);
    });

    searchResult?.addEventListener('click', (e) => {
        const option = e.target.closest('.resultsearch');
        if (!option) return;

        const name = option.querySelector('h3')?.innerText;
        const gameId = option.dataset.id;
        const platforms = option.dataset.platforms;

        gameNameInput.value = name;
        gameIdInput.value = gameId;

        if (platforms && select) {

            select.innerHTML = '';

            platforms.split(',').map(p => p.trim()).forEach(platform => {
                const opt = document.createElement('option');
                opt.value = platform;
                opt.textContent = platform;
                select.appendChild(opt);
            });
        }

        searchResult.innerHTML = '';
        searchResult.classList.add('hidden');
    });

    document.addEventListener('click', (e) => {
        if (!gameNameInput.contains(e.target) && !searchResult.contains(e.target)) {
            searchResult.innerHTML = '';
            searchResult.classList.add('hidden');
        }
    });

    modal?.addEventListener('hidden.tw.modal', function () {
        gameNameInput.value = '';
        gameIdInput.value = '';
    });
})
