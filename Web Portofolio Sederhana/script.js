// --- 1. EFEK TEKS MENGETIK (TYPING EFFECT) ---
// Array berisi daftar keahlian yang akan ditampilkan bergantian
const texts = [
    "Web Developer", 
    "Media Producer", 
    "Data & Cloud Enthusiast"
];

let count = 0;       // Melacak index array 'texts'
let index = 0;       // Melacak huruf ke-berapa yang sedang diketik
let currentText = "";// Menyimpan kata yang sedang aktif
let letter = "";     // Menyimpan huruf yang sedang diproses
let isDeleting = false; // Status apakah sedang menghapus teks atau mengetik

function type() {
    // Reset kembali ke awal jika sudah mencapai kata terakhir
    if (count === texts.length) {
        count = 0;
    }
    
    currentText = texts[count];

    // Logika menambah atau mengurangi huruf
    if (isDeleting) {
        letter = currentText.slice(0, --index); // Kurangi huruf
    } else {
        letter = currentText.slice(0, ++index); // Tambah huruf
    }

    // Tampilkan huruf ke dalam elemen HTML
    document.querySelector('.typing-text').textContent = letter;

    // Kecepatan mengetik: lebih cepat saat menghapus (40ms) vs mengetik (80ms)
    let typeSpeed = isDeleting ? 40 : 80;

    // Jika kata sudah selesai diketik utuh
    if (!isDeleting && letter.length === currentText.length) {
        typeSpeed = 2000; // Jeda 2 detik sebelum mulai menghapus
        isDeleting = true;
    } 
    // Jika kata sudah selesai dihapus (kosong)
    else if (isDeleting && letter.length === 0) {
        isDeleting = false;
        count++; // Pindah ke kata berikutnya di dalam array
        typeSpeed = 400; // Jeda singkat sebelum mengetik kata baru
    }

    // Panggil kembali fungsi secara rekursif dengan jeda waktu tertentu
    setTimeout(type, typeSpeed);
}

// Menjalankan efek setelah struktur HTML (DOM) selesai dimuat
document.addEventListener('DOMContentLoaded', type);


// --- 2. LOGIKA SIDEBAR MOBILE (TOGGLE MENU) ---
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const menuIcon = menuToggle.querySelector('i');
const navLinks = document.querySelectorAll('.nav-links li a');

// Event listener saat tombol hamburger diklik
menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active'); // Tambah/hapus class active
    
    // Mengubah ikon hamburger menjadi ikon X (close) dan sebaliknya
    if(sidebar.classList.contains('active')) {
        menuIcon.classList.remove('fa-bars');
        menuIcon.classList.add('fa-xmark');
    } else {
        menuIcon.classList.remove('fa-xmark');
        menuIcon.classList.add('fa-bars');
    }
});

// Menutup sidebar otomatis saat salah satu link navigasi diklik (Khusus Mobile)
navLinks.forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth <= 768) { // Mengecek jika lebar layar seukuran HP
            sidebar.classList.remove('active');
            menuIcon.classList.remove('fa-xmark');
            menuIcon.classList.add('fa-bars');
        }
    });
});


// --- 3. LOGIKA HIGHLIGHT LINK NAVIGASI SAAT DI-SCROLL ---
const sections = document.querySelectorAll("section");

window.addEventListener("scroll", () => {
    let current = "";
    
    // Mengecek posisi scroll layar saat ini dibandingkan posisi tiap section
    sections.forEach((section) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        // Jika layar men-scroll melewati batas atas section (dengan toleransi 200px)
        if (pageYOffset >= sectionTop - 200) {
            current = section.getAttribute("id"); // Ambil ID section yang sedang aktif
        }
    });

    // Sesuaikan class "active" pada link navigasi berdasarkan ID yang sedang dilihat
    navLinks.forEach((a) => {
        a.classList.remove("active");
        if (a.getAttribute("href").includes(current)) {
            a.classList.add("active");
        }
    });
});


// --- 4. LOGIKA FITUR DARK MODE / LIGHT MODE ---
const themeToggleBtn = document.getElementById('themeToggle');
const themeIcon = themeToggleBtn.querySelector('i');

// Cek 'localStorage' (Penyimpanan Browser) untuk melihat preferensi user sebelumnya
const currentTheme = localStorage.getItem('theme');

if (currentTheme) {
    // Terapkan tema dari penyimpanan jika ada
    document.documentElement.setAttribute('data-theme', currentTheme);
    if (currentTheme === 'dark') {
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun'); // Ganti ikon ke matahari untuk mode gelap
    }
}

// Event listener klik pada tombol tema
themeToggleBtn.addEventListener('click', () => {
    let theme = document.documentElement.getAttribute('data-theme');
    
    if (theme === 'dark') {
        // Jika sedang mode gelap, ubah ke terang
        document.documentElement.removeAttribute('data-theme');
        localStorage.setItem('theme', 'light'); // Simpan pilihan di browser
        themeIcon.classList.remove('fa-sun');
        themeIcon.classList.add('fa-moon');
    } else {
        // Jika sedang mode terang, ubah ke gelap
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); // Simpan pilihan di browser
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun');
    }
});