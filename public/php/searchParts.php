<?php
    // Parts Data
    $data = [
        [
            'judul' => 'Blok MOTO1 MX-King + Forging Piston',
            'deskripsi' => 'Blok mesin berkualitas tinggi dilengkapi dengan piston Forging yang presisi. Cocok untuk meningkatkan performa mesin motor dengan daya tahan optimal dan efisiensi maksimal.',
            'gambar' => '../garasibewok/public/images/parts/blok-seher.jpg'
        ],

        [
            'judul' => 'Head SUMRacing MX-King 25/22 + Valve',
            'deskripsi' => 'Kepala silinder SUMRacing lengkap dengan katup yang dirancang untuk mendukung performa motor balap. Memberikan aliran udara yang lebih baik dan daya output yang maksimal.',
            'gambar' => '../garasibewok/public/images/parts/paketan head.jpg'
        ],

        [
            'judul' => 'Valve Spring Samurai',
            'deskripsi' => 'Per yang dirancang untuk katup mesin motor dengan material berkualitas tinggi dari Japan. Memberikan stabilitas katup pada putaran tinggi dan daya tahan yang lama penggunaan.',
            'gambar' => '../garasibewok/public/images/parts/klep.jpg'
        ],

        [
            'judul' => 'Exhaust R9',
            'deskripsi' => 'Knalpot premium dari R9 dengan desain modern dan performa tinggi. Dirancang untuk meningkatkan aliran gas buang, menghasilkan suara yang khas, dan meningkatkan akselerasi motor.',
            'gambar' => '../garasibewok/public/images/parts/knalpot r9.jpg'
        ],

        [
            'judul' => 'MOTO1 Package Bore Up RX-King',
            'deskripsi' => 'Paket bore-up lengkap dari MOTO1 cocok untuk RX-King, termasuk silinder blok, piston, dan gasket. Cocok untuk meningkatkan kapasitas mesin secara signifikan dengan hasil tenaga yang lebih besar.',
            'gambar' => '../garasibewok/public/images/parts/header.jpg'
        ],
    ];

    $query = isset($_GET['search']) ? $_GET['search'] : '';

    if ($query !== '') {
        $results = array_filter($data, function($item) use ($query) {
            return strpos(strtolower($item['judul']), strtolower($query)) !== false ||
                strpos(strtolower($item['deskripsi']), strtolower($query)) !== false;
        });
    } else {
        $results = $data;
    }

    if (empty($results)) {
        echo "<p>Tidak ada hasil untuk pencarian ini.</p>";
    } else {
        foreach ($results as $result) {
            echo '
            <div class="max-w-sm bg-white border border-gray-300 rounded-lg drop-shadow-md transition duration-300 ease-in-out hover:scale-105">
                <a href="#">
                    <img class="rounded-t-lg w-full h-72 object-cover" src="' . $result['gambar'] . '" alt="' . $result['judul'] . '" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">' . $result['judul'] . '</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">' . $result['deskripsi'] . '</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-black rounded-lg focus:outline-none">
                        Baca lebih lanjut
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>';
        }
    }
?>
