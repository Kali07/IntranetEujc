// js/scripts.js

function toggleProfile() {
    const profileInfo = document.getElementById('profile-info');
    profileInfo.style.display = profileInfo.style.display === 'block' ? 'none' : 'block';
}

document.getElementById('notes').addEventListener('click', () => {
    document.getElementById('content').innerHTML = `
        <h1>Notes</h1>
        <textarea placeholder="Prenez vos notes ici..." style="width: 100%; height: 200px;"></textarea>
    `;
});

document.getElementById('qcm').addEventListener('click', () => {
    document.getElementById('content').innerHTML = `
        <h1>QCM</h1>
        <p>Cette section sera dédiée aux QCM.</p>
    `;
});

document.getElementById('stations').addEventListener('click', () => {
    document.getElementById('content').innerHTML = `
        <h1>Stations</h1>
        <p>Cette section sera dédiée aux stations.</p>
    `;
});
