const step1 = document.getElementById('setup-step-1');

step1.addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        generateNameFields();
    }
});

function generateNameFields() {
    const count = document.getElementById('playerCount').value;
    const container = document.getElementById('name-fields-container');
    const step2 = document.getElementById('setup-step-2');
    if (count < 2 || count > 4) {
        alert("Please select between 2 and 4 players.");
        return;
    };
    container.innerHTML = `<h3 class="input-label">Enter Player Names</h3>`;
    for (let i = 1; i <= count; i++) {
        container.innerHTML += `
            <div class="input-group">
                <input type="text" name="player_names[]" placeholder="Player ${i}" class="input-field" required>
            </div>
        `;
    };
    step1.style.display = 'none';
    step2.style.display = 'flex';
};