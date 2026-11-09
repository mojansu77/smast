<?php
/**
 * Template Name: Kurikulum & Akademik — SMAN 1 Kediri
 *
 * @package SMAST
 * @author  Mochamad Januar Sugiarto
 * @version 2.2.0
 */

get_header();
?>

<!-- ══════════════════════════════════════════════════════════════════════════
     PAGE HERO
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <a href="<?php echo esc_url( home_url( '/profil' ) ); ?>">Profil</a>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <span>Kurikulum &amp; Akademik</span>
            </div>
            <h1>Kurikulum &amp; <span>Program Akademik</span></h1>
            <p>Implementasi Kurikulum Merdeka berpusat pada murid, fleksibilitas pemilihan mata pelajaran pilihan rumpun MIPA &amp; IPS, penguatan karakter P5, serta pendampingan intensif menuju perguruan tinggi impian.</p>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     1. IKHTISAR KURIKULUM MERDEKA
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-section" id="kurikulum-merdeka" style="padding-top: 60px;">
    <div class="smast-container">

        <!-- Intro Banner -->
        <div class="smast-reveal" style="background: linear-gradient(135deg, var(--smast-navy) 0%, #001f3f 100%); color: #fff; border-radius: var(--smast-radius-lg); padding: 40px; margin-bottom: 50px; position: relative; overflow: hidden; box-shadow: var(--smast-shadow-md); border-left: 6px solid var(--smast-gold);">
            <div style="position: absolute; right: -30px; top: -30px; width: 180px; height: 180px; border-radius: 50%; background: rgba(255,184,0,0.12);"></div>
            <span style="display:inline-block; background:rgba(255,184,0,0.15); color:var(--smast-gold); padding:5px 14px; border-radius:50px; font-size:0.8rem; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:16px;">
                <i class="fas fa-book-open-reader"></i> Transformasi Pendidikan
            </span>
            <h2 style="font-size: clamp(1.4rem, 3vw, 1.95rem); margin-bottom: 16px; color: #fff; line-height: 1.3;">
                Penerapan Kurikulum Merdeka di SMA Negeri 1 Kota Kediri
            </h2>
            <p style="font-size: 0.98rem; line-height: 1.85; opacity: 0.94; margin-bottom: 16px;">
                Sebagai salah satu sekolah menengah atas unggulan di Jawa Timur, SMA Negeri 1 Kota Kediri menerapkan <strong>Kurikulum Merdeka</strong> secara menyeluruh. Pendekatan ini dirancang untuk memberikan ruang keleluasaan belajar, mendalami minat dan bakat secara terarah, serta mengikis sistem sekat jurusan kaku demi mempersiapkan generasi berdaya saing global.
            </p>
            <p style="font-size: 0.98rem; line-height: 1.85; opacity: 0.94; margin: 0;">
                Sistem pembelajaran diperkuat dengan <strong>Full Day School (5 hari sekolah)</strong> yang mengintegrasikan penguasaan literasi-numerasi, praktikum sains di laboratorium modern, bimbingan olimpiade, serta pembiasaan nilai-nilai religius dan kepedulian lingkungan hidup (MUSTIKA).
            </p>
        </div>

        <!-- Dua Fase Utama: Fase E & Fase F -->
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-layer-group"></i> Tahapan Pembelajaran</span>
            <h2 class="smast-section-title">Struktur Fase <span>Belajar SMA</span></h2>
            <p class="smast-section-desc">Peralihan dari fondasi akademik umum menuju spesialisasi terarah sesuai cita-cita masa depan peserta didik.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 28px; margin-bottom: 60px;">

            <!-- Fase E: Kelas X -->
            <div class="smast-card smast-reveal" style="border-top: 4px solid var(--smast-blue-nav); display: flex; flex-direction: column;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px;">
                    <span style="background: rgba(0,102,178,0.12); color: var(--smast-blue-nav); font-weight: 800; padding: 6px 14px; border-radius: 50px; font-size: 0.82rem;">
                        <i class="fas fa-seedling"></i> FASE E
                    </span>
                    <strong style="color: var(--smast-text-muted); font-size: 0.86rem;">Kelas X (Sepuluh)</strong>
                </div>
                <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 12px;">Eksplorasi &amp; Fondasi Terpadu</h3>
                <p style="font-size: 0.92rem; color: var(--smast-text-muted); line-height: 1.75; margin-bottom: 18px;">
                    Pada Fase E, <strong>tidak ada penjurusan kaku</strong> (belum ada pemisahan kelas MIPA atau IPS). Semua peserta didik mendapatkan mata pelajaran umum yang sama agar memiliki wawasan keilmuan yang kokoh dan seimbang.
                </p>
                <div style="background: var(--smast-off-white); border-radius: 10px; padding: 16px; margin-top: auto; border: 1px solid var(--smast-border);">
                    <strong style="font-size: 0.85rem; color: var(--smast-navy); display: block; margin-bottom: 8px;">
                        <i class="fas fa-check-circle" style="color: #10B981;"></i> Fokus Fase E di SMAN 1 Kediri:
                    </strong>
                    <ul style="margin: 0; padding-left: 20px; font-size: 0.86rem; color: var(--smast-text); line-height: 1.65;">
                        <li>Penguasaan konsep dasar sains, matematika, sosial, bahasa &amp; seni.</li>
                        <li>Asesmen diagnostik dan penelusuran minat bakat bersama Guru BK.</li>
                        <li>Eksplorasi karier dan sosialisasi mata pelajaran pilihan untuk Fase F.</li>
                        <li>Pelaksanaan Projek Penguatan Profil Pelajar Pancasila (P5).</li>
                    </ul>
                </div>
            </div>

            <!-- Fase F: Kelas XI & XII -->
            <div class="smast-card smast-reveal smast-reveal-delay-1" style="border-top: 4px solid var(--smast-gold); display: flex; flex-direction: column;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px;">
                    <span style="background: rgba(255,184,0,0.15); color: #B45309; font-weight: 800; padding: 6px 14px; border-radius: 50px; font-size: 0.82rem;">
                        <i class="fas fa-rocket"></i> FASE F
                    </span>
                    <strong style="color: var(--smast-text-muted); font-size: 0.86rem;">Kelas XI &amp; XII (Sebelas &amp; Dua Belas)</strong>
                </div>
                <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 12px;">Pemilihan Mata Pelajaran Pilihan</h3>
                <p style="font-size: 0.92rem; color: var(--smast-text-muted); line-height: 1.75; margin-bottom: 18px;">
                    Memasuki Fase F, siswa memiliki keleluasaan untuk <strong>memilih kelompok mata pelajaran pilihan</strong> sesuai dengan minat, bakat, dan rencana program studi perguruan tinggi (SNBP dan UTBK-SNBT).
                </p>
                <div style="background: var(--smast-off-white); border-radius: 10px; padding: 16px; margin-top: auto; border: 1px solid var(--smast-border);">
                    <strong style="font-size: 0.85rem; color: var(--smast-navy); display: block; margin-bottom: 8px;">
                        <i class="fas fa-check-circle" style="color: var(--smast-gold);"></i> Keunggulan Fase F di SMAN 1 Kediri:
                    </strong>
                    <ul style="margin: 0; padding-left: 20px; font-size: 0.86rem; color: var(--smast-text); line-height: 1.65;">
                        <li>Pilihan rumpun mendalam: MIPA (Saintek) dan IPS (Soshum).</li>
                        <li>Fleksibilitas lintas minat yang diselaraskan dengan kuota &amp; aturan SNPMB.</li>
                        <li>Praktikum intensif di laboratorium sains &amp; IT terakreditasi.</li>
                        <li>Klinik konsultasi peminatan jurusan kuliah secara personal.</li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     2. PROGRAM PEMINATAN & PILIHAN AKADEMIK (MIPA & IPS)
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-section bg-light" id="mipa-ips">
    <div class="smast-container">

        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-graduation-cap"></i> Rumpun Peminatan Akademik</span>
            <h2 class="smast-section-title">Program Pilihan <span>MIPA &amp; IPS</span></h2>
            <p class="smast-section-desc">Fasilitas kurikulum komprehensif untuk mencetak ilmuwan sains, teknokrat, tenaga medis, ekonom, diplomat, dan profesional unggul masa depan.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 32px; margin-bottom: 50px;">

            <!-- Rumpun MIPA (Sains & Teknologi) -->
            <div class="smast-card smast-reveal" style="border: 2px solid rgba(0, 102, 178, 0.18); position: relative; overflow: hidden;">
                <div style="position: absolute; right: 0; top: 0; width: 90px; height: 90px; background: radial-gradient(circle at top right, rgba(0, 102, 178, 0.12), transparent); border-bottom-left-radius: 90px;"></div>
                <div class="smast-card-icon icon-navy" style="margin-bottom: 20px;">
                    <i class="fas fa-atom" aria-hidden="true"></i>
                </div>
                <span style="font-size: 0.78rem; font-weight: 700; color: #0284C7; text-transform: uppercase; letter-spacing: 1px;">Sains, Teknologi, Rekayasa &amp; Medis</span>
                <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--smast-navy); margin: 6px 0 14px;">Rumpun MIPA (Saintek)</h3>
                <p style="font-size: 0.92rem; color: var(--smast-text-muted); line-height: 1.75; margin-bottom: 20px;">
                    Program unggulan bagi peserta didik yang memiliki minat tinggi pada bidang sains alam, riset matematika terapan, rekayasa teknologi informasi, kedokteran, farmasi, dan teknik.
                </p>

                <h4 style="font-size: 0.92rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 10px;">
                    <i class="fas fa-books" style="color: var(--smast-gold);"></i> Mata Pelajaran Pilihan Lanjutan:
                </h4>
                <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 22px;">
                    <span style="background: rgba(0, 102, 178, 0.08); color: var(--smast-navy); padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-square-root-variable"></i> Matematika Lanjut</span>
                    <span style="background: rgba(0, 102, 178, 0.08); color: var(--smast-navy); padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-bolt"></i> Fisika</span>
                    <span style="background: rgba(0, 102, 178, 0.08); color: var(--smast-navy); padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-flask"></i> Kimia</span>
                    <span style="background: rgba(0, 102, 178, 0.08); color: var(--smast-navy); padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-dna"></i> Biologi</span>
                    <span style="background: rgba(0, 102, 178, 0.08); color: var(--smast-navy); padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-code"></i> Informatika / Coding</span>
                </div>

                <h4 style="font-size: 0.92rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 10px;">
                    <i class="fas fa-microscope" style="color: #10B981;"></i> Sarana Laboratorium Modern:
                </h4>
                <p style="font-size: 0.88rem; color: var(--smast-text); line-height: 1.65; margin-bottom: 20px;">
                    Laboratorium Fisika, Laboratorium Kimia berstandar safety, Laboratorium Biologi dengan mikroskop presisi, dan Laboratorium Multimedia Komputer dengan koneksi serat optik berkecepatan tinggi.
                </p>

                <div style="background: rgba(16, 185, 129, 0.08); border-left: 3px solid #10B981; padding: 12px 16px; border-radius: 0 8px 8px 0; font-size: 0.85rem; color: var(--smast-text);">
                    <strong>Capaian Alumni:</strong> Lolos di fakultas kedokteran favorit (UNAIR, UB, UGM), institut teknologi (ITB, ITS), serta konsisten menyumbang medali di ajang OSN dan OMIPA Nasional.
                </div>
            </div>

            <!-- Rumpun IPS (Sosial & Humaniora) -->
            <div class="smast-card smast-reveal smast-reveal-delay-1" style="border: 2px solid rgba(255, 184, 0, 0.28); position: relative; overflow: hidden;">
                <div style="position: absolute; right: 0; top: 0; width: 90px; height: 90px; background: radial-gradient(circle at top right, rgba(255, 184, 0, 0.15), transparent); border-bottom-left-radius: 90px;"></div>
                <div class="smast-card-icon icon-gold" style="margin-bottom: 20px;">
                    <i class="fas fa-landmark" aria-hidden="true"></i>
                </div>
                <span style="font-size: 0.78rem; font-weight: 700; color: #D97706; text-transform: uppercase; letter-spacing: 1px;">Sosial, Humaniora, Ekonomi &amp; Hukum</span>
                <h3 style="font-size: 1.4rem; font-weight: 800; color: var(--smast-navy); margin: 6px 0 14px;">Rumpun IPS (Soshum)</h3>
                <p style="font-size: 0.92rem; color: var(--smast-text-muted); line-height: 1.75; margin-bottom: 20px;">
                    Program unggulan bagi peserta didik yang memiliki kepedulian mendalam pada dinamika sosial masyarakat, literasi ekonomi, hukum, hubungan internasional, psikologi, dan komunikasi global.
                </p>

                <h4 style="font-size: 0.92rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 10px;">
                    <i class="fas fa-books" style="color: var(--smast-gold);"></i> Mata Pelajaran Pilihan Lanjutan:
                </h4>
                <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 22px;">
                    <span style="background: rgba(255, 184, 0, 0.12); color: #92400E; padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-chart-line"></i> Ekonomi &amp; Akuntansi</span>
                    <span style="background: rgba(255, 184, 0, 0.12); color: #92400E; padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-users-viewfinder"></i> Sosiologi</span>
                    <span style="background: rgba(255, 184, 0, 0.12); color: #92400E; padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-earth-asia"></i> Geografi</span>
                    <span style="background: rgba(255, 184, 0, 0.12); color: #92400E; padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-hourglass-half"></i> Sejarah Tingkat Lanjut</span>
                    <span style="background: rgba(255, 184, 0, 0.12); color: #92400E; padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;"><i class="fas fa-people-arrows"></i> Antropologi</span>
                </div>

                <h4 style="font-size: 0.92rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 10px;">
                    <i class="fas fa-comments" style="color: #6366F1;"></i> Metode Pembelajaran Praktik:
                </h4>
                <p style="font-size: 0.88rem; color: var(--smast-text); line-height: 1.65; margin-bottom: 20px;">
                    Riset sosial lapangan, karya tulis ilmiah (KIR), simulasi peradilan semu &amp; debat parlemen bahasa, laboratorium bahasa multimedia, serta literasi keuangan dan kewirausahaan nyata.
                </p>

                <div style="background: rgba(245, 158, 11, 0.10); border-left: 3px solid var(--smast-gold); padding: 12px 16px; border-radius: 0 8px 8px 0; font-size: 0.85rem; color: var(--smast-text);">
                    <strong>Capaian Alumni:</strong> Mengisi jurusan hukum, hubungan internasional, akuntansi, dan psikologi di universitas terkemuka (UI, UGM, UNAIR, UB) serta juara debat bahasa nasional.
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     3. PROJEK PENGUATAN PROFIL PELAJAR PANCASILA (P5)
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-section" id="p5">
    <div class="smast-container">

        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-hands-holding-child"></i> Karakter &amp; Integritas</span>
            <h2 class="smast-section-title">Implementasi Projek <span>P5 di SMAST</span></h2>
            <p class="smast-section-desc">Membangun karakter tangguh, kreatif, berakhlak mulia, dan berjiwa Pancasila melalui pembelajaran berbasis projek kontekstual.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 40px;">

            <div class="smast-card smast-reveal" style="padding: 24px;">
                <div style="width: 44px; height: 44px; background: rgba(16, 185, 129, 0.12); color: #10B981; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 16px;">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Gaya Hidup Berkelanjutan</h3>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.65; margin: 0;">
                    Aksi nyata kepedulian lingkungan (MUSTIKA): pengelolaan sampah mandiri, konservasi lingkungan sungai Brantas, dan program sekolah Adiwiyata mandiri.
                </p>
            </div>

            <div class="smast-card smast-reveal smast-reveal-delay-1" style="padding: 24px;">
                <div style="width: 44px; height: 44px; background: rgba(245, 158, 11, 0.12); color: #F59E0B; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 16px;">
                    <i class="fas fa-palette"></i>
                </div>
                <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Kearifan Lokal Kediri</h3>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.65; margin: 0;">
                    Eksplorasi budaya leluhur Kota Kediri: revitalisasi seni sastra Panji, pelestarian kuliner tradisional tahu &amp; tenun ikat Bandar Kidul, serta riset cagar budaya lokal.
                </p>
            </div>

            <div class="smast-card smast-reveal smast-reveal-delay-2" style="padding: 24px;">
                <div style="width: 44px; height: 44px; background: rgba(59, 130, 246, 0.12); color: #3B82F6; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 16px;">
                    <i class="fas fa-microchip"></i>
                </div>
                <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Rekayasa &amp; Teknologi</h3>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.65; margin: 0;">
                    Penciptaan solusi teknologi tepat guna oleh siswa: pemanfaatan IoT untuk monitoring tanaman, perancangan prototipe robotik, dan pembuatan aplikasi edukatif digital.
                </p>
            </div>

            <div class="smast-card smast-reveal" style="padding: 24px;">
                <div style="width: 44px; height: 44px; background: rgba(139, 92, 246, 0.12); color: #8B5CF6; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 16px;">
                    <i class="fas fa-shop"></i>
                </div>
                <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Kewirausahaan Siswa</h3>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.65; margin: 0;">
                    Menumbuhkan jiwa wirausaha berdaya saing: mulai dari perancangan model bisnis, inovasi produk bernilai tambah, hingga penyelenggaraan Gelar Karya &amp; Bazar Smast.
                </p>
            </div>

            <div class="smast-card smast-reveal smast-reveal-delay-1" style="padding: 24px;">
                <div style="width: 44px; height: 44px; background: rgba(239, 68, 68, 0.12); color: #EF4444; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 16px;">
                    <i class="fas fa-check-to-slot"></i>
                </div>
                <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Suara Demokrasi</h3>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.65; margin: 0;">
                    Pendidikan politik santun dan beretika: simulasi pemilihan umum ketua OSIS &amp; MPK secara langsung, debat terbuka kandidat, dan manajemen pemungutan suara digital (E-Voting).
                </p>
            </div>

            <div class="smast-card smast-reveal smast-reveal-delay-2" style="padding: 24px;">
                <div style="width: 44px; height: 44px; background: rgba(14, 165, 233, 0.12); color: #0EA5E9; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 16px;">
                    <i class="fas fa-heart-pulse"></i>
                </div>
                <h3 style="font-size: 1.15rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 8px;">Bangunlah Jiwa dan Raganya</h3>
                <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.65; margin: 0;">
                    Edukasi kesehatan mental remaja, pencegahan perundungan (anti-bullying), pola hidup aktif berolahraga, serta penguatan spiritualitas harian di lingkungan sekolah.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     4. PROGRAM SUKSES MASUK PTN & PRESTASI
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-section bg-light" id="ptn-prestasi">
    <div class="smast-container">

        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-trophy"></i> Rekam Jejak Unggulan</span>
            <h2 class="smast-section-title">Pendampingan <span>Studi Lanjut &amp; Prestasi</span></h2>
            <p class="smast-section-desc">Komitmen penuh SMAN 1 Kediri mengantarkan peserta didik menembus perguruan tinggi negeri terbaik di Indonesia dan kancah internasional.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 24px; margin-bottom: 50px;">

            <div class="smast-card smast-reveal">
                <div style="font-size: 2rem; color: var(--smast-navy); margin-bottom: 12px;"><i class="fas fa-chart-pie"></i></div>
                <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 10px;">Pemetaan Rapor SNBP</h3>
                <p style="font-size: 0.90rem; color: var(--smast-text-muted); line-height: 1.7; margin: 0;">
                    Analisis data nilai rapor semester 1 hingga semester 5 menggunakan algoritma pemetaan kuota berbasis histori kelolosan alumni SMAN 1 Kediri di PTN favorit.
                </p>
            </div>

            <div class="smast-card smast-reveal smast-reveal-delay-1">
                <div style="font-size: 2rem; color: var(--smast-gold); margin-bottom: 12px;"><i class="fas fa-laptop-file"></i></div>
                <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 10px;">Try Out Intensif UTBK-SNBT</h3>
                <p style="font-size: 0.90rem; color: var(--smast-text-muted); line-height: 1.7; margin: 0;">
                    Simulasi berkala Tes Skolastik dan Tes Literasi berbasis sistem Computer-Based Testing (CBT) terstandar nasional untuk mengukur kesiapan riil ujian masuk PTN.
                </p>
            </div>

            <div class="smast-card smast-reveal smast-reveal-delay-2">
                <div style="font-size: 2rem; color: #10B981; margin-bottom: 12px;"><i class="fas fa-medal"></i></div>
                <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--smast-navy); margin-bottom: 10px;">Bimbingan Khusus Olimpiade (OSN)</h3>
                <p style="font-size: 0.90rem; color: var(--smast-text-muted); line-height: 1.7; margin: 0;">
                    Klub Sains SMAST dibina secara intensif bersama guru ahli dan alumni peraih medali untuk mendominasi ajang Olimpiade Sains Nasional (OSN) tingkat kota, provinsi, dan nasional.
                </p>
            </div>

        </div>

        <!-- Banner Tautan ke Galeri Prestasi -->
        <div class="smast-reveal" style="background: linear-gradient(135deg, #003366 0%, #001f3f 100%); border-radius: var(--smast-radius-lg); padding: 36px; color: #fff; display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap; box-shadow: var(--smast-shadow-md);">
            <div>
                <span style="background: rgba(255, 184, 0, 0.2); color: var(--smast-gold); font-size: 0.8rem; font-weight: 700; padding: 4px 12px; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px;">
                    <i class="fas fa-star"></i> Rekam Jejak Juara
                </span>
                <h3 style="font-size: 1.45rem; font-weight: 800; margin: 10px 0 6px; color: #fff;">Lihat Dokumentasi Prestasi Siswa-Siswi SMAST</h3>
                <p style="margin: 0; font-size: 0.92rem; opacity: 0.9; max-width: 600px;">
                    Jelajahi galeri piala, medali kejuaraan sains, olahraga, seni budaya, serta foto kebanggaan civitas akademika SMAN 1 Kota Kediri.
                </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/galeri?kategori=prestasi#galeri-content' ) ); ?>" class="smast-btn smast-btn-gold smast-btn-lg" style="white-space: nowrap;">
                <i class="fas fa-trophy"></i> <span>Buka Galeri Prestasi</span> <i class="fas fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>

<?php
get_footer();

