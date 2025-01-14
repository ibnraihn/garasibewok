<?php
    // Services Data
    $data = [
        [
            'judul' => 'Overall Tuning Up (OTU)',
            'deskripsi' => 'Penggantian oli mesin, pembersihan sistem bahan bakar, pengecekan sistem kelistrikan, perawatan sistem rem, dan kondisi mesin.',
            'gambar' => '../garasibewok/public/images/layanan/tune up.jpg'
        ],

        [
            'judul' => 'Pergantian Kampas Rem',
            'deskripsi' => 'Perawatan sistem pengereman dengan mengganti kampas rem yang sudah aus. Juga melibatkan pengecekan sistem pendukung rem lainnya.',
            'gambar' => '../garasibewok/public/images/layanan/kampas-rem.jpg'
        ],

        [
            'judul' => 'Pergantian Oli',
            'deskripsi' => 'Layanan penggantian oli mesin untuk menjaga performa mesin, kebersihan internal, dan mencegah kerusakan akibat pelumasan yang buruk.',
            'gambar' => '../garasibewok/public/images/layanan/ganti-oli.jpg'
        ],

        [
            'judul' => 'Pergantian Ban',
            'deskripsi' => 'Proses mengganti ban kendaraan untuk memastikan keamanan dan kenyamanan berkendara. Biasanya termasuk pengecekan kondisi ban cadangan.',
            'gambar' => '../garasibewok/public/images/layanan/ganti-ban.jpg'
        ],

        [
            'judul' => 'Clutch Housing Service',
            'deskripsi' => 'Perbaikan dan perawatan komponen kopling, termasuk penggantian kampas kopling, pembersihan housing kopling, dan pengecekan komponen transmisi terkait.',
            'gambar' => '../garasibewok/public/images/layanan/header.jpg'
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
