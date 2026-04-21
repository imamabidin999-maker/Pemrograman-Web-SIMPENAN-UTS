function initActiveMenu() {
    const navContainer = document.getElementById('sidebar-nav');
    if (!navContainer) return;

    const currentUrl = window.location.href;
    const navLinks = navContainer.querySelectorAll('a');

    navLinks.forEach(link => {
        const linkHref = link.getAttribute('href');
        if (currentUrl.endsWith(linkHref) || (currentUrl.endsWith('/admin/') && linkHref === 'index.php')) {
            link.classList.add('bg-[#00CC33]', 'text-[#1e3d1a]', 'shadow-[3px_3px_0px_0px_rgba(30,61,26,1)]');
            link.classList.remove('opacity-60');
        } else {
            link.classList.add('opacity-60', 'hover:opacity-100', 'hover:bg-emerald-900/30');
            link.classList.remove('bg-[#00CC33]', 'text-[#1e3d1a]', 'shadow-[3px_3px_0px_0px_rgba(30,61,26,1)]');
        }
    });
}

function updateClock() {
    const clock = document.getElementById('clock');
    if (!clock) return;
    const now = new Date();
    clock.textContent = now.getHours().toString().padStart(2, '0') + ":" + 
                        now.getMinutes().toString().padStart(2, '0') + ":" + 
                        now.getSeconds().toString().padStart(2, '0');
}

function setGreeting() {
    const greet = document.getElementById('greeting');
    if (!greet) return;
    const hr = new Date().getHours();
    let msg = hr < 11 ? "Selamat Pagi ☀️" : hr < 15 ? "Selamat Siang 🌤️" : hr < 18 ? "Selamat Sore 🌅" : "Selamat Malam 🌙";
    greet.textContent = msg;
}

function initDarkMode() {
    const toggleBtn = document.getElementById('toggle-dark');
    const htmlElement = document.documentElement;

    if (localStorage.getItem('theme') === 'dark') {
        htmlElement.classList.add('dark');
        if (toggleBtn) toggleBtn.innerHTML = '☀️ Mode Terang';
    } else {
        htmlElement.classList.remove('dark');
        if (toggleBtn) toggleBtn.innerHTML = '🌙 Mode Gelap';
    }

    if (toggleBtn) {
        toggleBtn.replaceWith(toggleBtn.cloneNode(true));
        const newBtn = document.getElementById('toggle-dark');
        
        newBtn.addEventListener('click', () => {
            htmlElement.classList.toggle('dark');
            if (htmlElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
                newBtn.innerHTML = '☀️ Mode Terang';
            } else {
                localStorage.setItem('theme', 'light');
                newBtn.innerHTML = '🌙 Mode Gelap';
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    updateClock();
    setGreeting();
    initDarkMode();
    initActiveMenu();
    setInterval(updateClock, 1000);

    const logoutTrigger = document.getElementById('logout-trigger');
    const logoutModal = document.getElementById('logout-modal');
    const btnCancel = document.getElementById('btn-cancel');

    if (logoutTrigger && logoutModal) {
        logoutTrigger.addEventListener('click', (e) => {
            e.preventDefault();
            logoutModal.classList.remove('hidden');
            logoutModal.classList.add('flex');
        });
    }

    if (btnCancel && logoutModal) {
        btnCancel.addEventListener('click', () => {
            logoutModal.classList.add('hidden');
            logoutModal.classList.remove('flex');
        });
    }
});

function showDetail(nama, ciri, penanganan, foto) {
    const modal = document.getElementById('modal-detail');
    document.getElementById('modal-title').innerText = nama;
    document.getElementById('modal-ciri').innerText = ciri || 'Data ciri-ciri belum tersedia.';
    document.getElementById('modal-penanganan').innerText = penanganan || 'Data penanganan belum tersedia.';

    const imgElement = document.getElementById('modal-foto');
    imgElement.src = foto ? 'assets/img/penyakit/' + foto : 'assets/img/no-image.png';

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function loadBpsData() {
    fetch('api/ambil_data_bps.php')
        .then(response => response.json())
        .then(res => {
            const body = document.getElementById('bps-data-body');
            body.innerHTML = '';

            const varId = "792";
            const thId = "118";
            const turThId = "0";

            res.vervar.forEach(opt => {
                if (opt.val == 1) return;

                let row = `<tr class="border-b-2 border-gray-50 dark:border-slate-700">
                    <td class="p-6 italic uppercase text-kementan font-black">${opt.label}</td>`;

                [1120, 1121, 1122, 1123].forEach(turvar => {
                    const key = `${opt.val}${varId}${turvar}${thId}${turThId}`;
                    const val = res.datacontent[key] || 0;
                    row += `<td class="p-6">${val.toLocaleString()}</td>`;
                });

                row += `</tr>`;
                body.innerHTML += row;
            });
        })
        .catch(err => console.error('Error BPS:', err));
}

document.addEventListener('DOMContentLoaded', loadBpsData);

function closeModal() {
    const modal = document.getElementById('modal-detail');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

let allOptData = []; // Simpan data BPS di sini untuk filter

function getOtomatisKategori(label) {
    const text = label.toLowerCase();

    // Kata kunci untuk kelompok Hama (Hewan/Serangga)
    const keywordHama = ['ulat', 'tikus', 'wereng', 'belalang', 'lalat', 'uret', 'siput', 'thrips', 'burung', 'penggerek', 'ganjur', 'walang', 'kepinding'];
    
    // Kata kunci untuk kelompok Penyakit (Bakteri/Virus/Jamur)
    const keywordPenyakit = ['bercak', 'hawar', 'kerdil', 'noda', 'blas', 'tungro', 'jingga', 'b l s', 'b r s', 'pelepah', 'bakteri'];

    // Logika Otomatis: Cek apakah label mengandung kata kunci di atas
    if (keywordHama.some(key => text.includes(key))) {
        return "Hama";
    } else if (keywordPenyakit.some(key => text.includes(key))) {
        return "Penyakit";
    } else {
        return "Lainnya"; // Jika tidak ada yang cocok
    }
}

function renderTable(data) {
    const body = document.getElementById('merged-data-body');
    body.innerHTML = '';
    
    data.forEach((item, index) => {
        const kategori = getOtomatisKategori(item.label);
        const labelLower = item.label.toLowerCase();
        
        // Ambil objek data lokal jika ada
        const local = dataGejalaLokal[labelLower] || null;
        
        const gejala = local ? local.gejala : '<span class="opacity-20 italic text-[10px]">Data Belum Teridentifikasi</span>';
        const ciri = local ? local.ciri.replace(/'/g, "\\'") : ''; // Escape petik satu
        const penanganan = local ? local.penanganan.replace(/'/g, "\\'") : '';
        const foto = local ? local.foto : '';

        // Tambahkan onclick="showDetail(...)" pada tag <tr>
        let row = `<tr class="border-b-2 border-gray-50 dark:border-slate-700 hover:bg-emerald-50 dark:hover:bg-slate-700 transition-all text-center cursor-pointer group" 
                    onclick="showDetail('${item.label}', '${ciri}', '${penanganan}', '${foto}')">
            <td class="p-5 text-gray-300 text-xs">#${index + 1}</td>
            <td class="p-5 italic uppercase text-kementan font-black text-left">
                ${item.label}
                <span class="text-[8px] ml-1 opacity-0 group-hover:opacity-100 transition-all text-yellow-500 underline">Lihat Detail →</span>
            </td>
            <td class="p-5 text-[10px]">
                <span class="${kategori === 'Hama' ? 'bg-orange-100 text-orange-600' : kategori === 'Penyakit' ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-500'} px-2 py-1 rounded-md uppercase font-black">
                    ${kategori}
                </span>
            </td>
            <td class="p-5">${item.ringan.toLocaleString()}</td>
            <td class="p-5">${item.sedang.toLocaleString()}</td>
            <td class="p-5">${item.berat.toLocaleString()}</td>
            <td class="p-5">${item.puso.toLocaleString()}</td>
            <td class="p-5 text-left text-[11px] font-medium leading-tight opacity-70 border-l border-emerald-50 dark:border-slate-700">
                ${gejala}
            </td>
        </tr>`;
        body.innerHTML += row;
    });
}

function loadMergedData() {
    fetch('api/ambil_data_bps.php')
        .then(r => r.json())
        .then(res => {
            const varId = "792", thId = "118", turThId = "0";

            allOptData = res.vervar.filter(opt => opt.val != 1).map(opt => {
                return {
                    label: opt.label,
                    ringan: res.datacontent[`${opt.val}${varId}1120${thId}${turThId}`] || 0,
                    sedang: res.datacontent[`${opt.val}${varId}1121${thId}${turThId}`] || 0,
                    berat:  res.datacontent[`${opt.val}${varId}1122${thId}${turThId}`] || 0,
                    puso:   res.datacontent[`${opt.val}${varId}1123${thId}${turThId}`] || 0
                };
            });
            renderTable(allOptData);
        });
}

document.getElementById('search-opt')?.addEventListener('input', (e) => {
    const keyword = e.target.value.toLowerCase();
    const filtered = allOptData.filter(item => 
        item.label.toLowerCase().includes(keyword) || 
        getOtomatisKategori(item.label).toLowerCase().includes(keyword)
    );
    renderTable(filtered);
});

document.addEventListener('DOMContentLoaded', loadMergedData);

window.onclick = function(event) {
    const modal = document.getElementById('modal-detail');
    if (event.target == modal) {
        closeModal();
    }
}