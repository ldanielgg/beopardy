function generateNameFields() {
    const count = document.getElementById('playerCount').value;
    const container = document.getElementById('name-fields-container');
    const step1 = document.getElementById('setup-step-1');
    const step2 = document.getElementById('setup-step-2');

    // basic validation
    if (count < 1 || count > 4) {
        alert("Please select between 1 and 4 players.");
        return;
    }

    // clear previous fields and generate new ones
    container.innerHTML = `<h3>Enter Player Names</h3>`;
    for (let i = 1; i <= count; i++) {
        container.innerHTML += `
            <div class="input-group">
                <label>Player ${i}:</label>
                <input type="text" name="player_names[]" placeholder="Enter Name" required>
            </div>
        `;
    }

    // transition UI
    step1.style.display = 'none';
    step2.style.display = 'flex';
}