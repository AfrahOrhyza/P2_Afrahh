<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afrah - Letter Preview - Form Surat</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        
        .form-section, .preview-section {
            flex: 1;
            min-width: 300px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #444;
            font-size: 24px;
        }
        
        .description {
            text-align: center;
            margin-bottom: 20px;
            color: #666;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }
        
        input, textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        #isiSurat {
            min-height: 150px;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .button-group-double {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-weight: 500;
            flex: 1;
            transition: all 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        #generateBtn {
            background-color: #4a6fa5;
            color: white;
        }
        
        #resetBtn {
            background-color: #f1f1f1;
            color: #333;
        }
        
        #printBtn {
            background-color: #5a8d5a;
            color: white;
        }
        
        .preview-section h2 {
            margin-bottom: 15px;
            color: #444;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        
        .letter-preview {
            background-color: white;
            padding: 25px;
            border: 1px solid #ddd;
            line-height: 1.6;
            min-height: 500px;
        }
        
        .letter-content {
            text-align: left;
        }
        
        /* Kota dan tanggal di kanan */
        .letter-header {
            margin-bottom: 30px;
            text-align: right;
        }
        
        .city-date-container {
            text-align: right;
            margin-bottom: 10px;
        }
        
        .letter-body {
            margin-bottom: 20px;
        }
        
        .letter-closing {
            margin-top: 40px;
        }
        
        .letter-footer {
            margin-top: 50px;
        }
        
        .field-placeholder {
            color: #999;
            font-style: italic;
        }
        
        /* Styling khusus untuk bagian alamat penerima */
        .recipient-address {
            margin-top: 30px;
            margin-bottom: 20px;
            text-align: left;
        }
        
        .letter-subject {
            margin-bottom: 20px;
            text-align: left;
        }
        
        /* Print styles - Hanya surat yang tercetak */
        @media print {
            .form-section, .button-group, .button-group-double, h1, .description, .preview-section h2 {
                display: none !important;
            }
            
            body {
                padding: 0;
                background-color: white;
            }
            
            .container {
                margin-top: 0;
                gap: 0;
            }
            
            .preview-section {
                box-shadow: none;
                padding: 0;
                border-radius: 0;
                width: 100%;
            }
            
            .letter-preview {
                border: none;
                box-shadow: none;
                padding: 20px;
                min-height: auto;
                page-break-inside: avoid;
            }
            
            /* Memastikan surat tidak terpotong saat dicetak */
            .letter-content {
                font-size: 12pt;
                line-height: 1.5;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .form-section, .preview-section {
                width: 100%;
            }
            
            .button-group, .button-group-double {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <h1>Job Application Letter </h1>
    <p class="description"></p>
    
    <div class="container">
        <div class="form-section">
            <h2>Form Surat</h2>
            <form id="letterForm">
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" id="kota" placeholder="Contoh: Jakarta">
                </div>
                
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal">
                </div>
                
                <div class="form-group">
                    <label for="subjek">Subjek Surat</label>
                    <input type="text" id="subjek" placeholder="Contoh: Permohonan Izin">
                </div>
                
                <div class="form-group">
                    <label for="alamatPenerima">Alamat Penerima</label>
                    <textarea id="alamatPenerima" placeholder="Tulis alamat lengkap penerima surat"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="pembuka">Paragraph Pembuka</label>
                    <textarea id="pembuka" placeholder="Contoh: Dengan hormat,"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="isiSurat">Isi Surat</label>
                    <textarea id="isiSurat" placeholder="Tulis isi surat Anda di sini"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="penutup">Penutup Surat</label>
                    <textarea id="penutup" placeholder="Contoh: Demikian surat ini kami sampaikan, terima kasih."></textarea>
                </div>
                
                <div class="form-group">
                    <label for="namaPenulis">Nama Penulis</label>
                    <input type="text" id="namaPenulis" placeholder="Nama Anda">
                </div>
                
                <!-- TOMBOL CETAK DIPINDAH KE SINI -->
                <div class="button-group">
                    <button type="button" id="generateBtn">Generate Preview</button>
                    <button type="button" id="resetBtn">Reset Form</button>
                </div>
                
                <div class="button-group-double">
                    <button type="button" id="printBtn">Cetak Surat</button>
                </div>
            </form>
        </div>
        
        <div class="preview-section">
            <h2>Preview Surat</h2>
            <div class="letter-preview" id="letterPreview">
                <div class="letter-content">
                    <!-- Kota dan tanggal di kanan -->
                    <div class="letter-header">
                        <div class="city-date-container">
                            <div id="previewKota" class="field-placeholder">[Kota]</div>
                            <div id="previewTanggal" class="field-placeholder">[Tanggal]</div>
                        </div>
                        
                        <div class="recipient-address">
                            <div id="previewAlamatPenerima" class="field-placeholder">[Alamat Penerima]</div>
                        </div>
                        
                        <div class="letter-subject">
                            <div id="previewSubjek" class="field-placeholder">[Subjek Surat]</div>
                        </div>
                    </div>
                    
                    <div class="letter-body">
                        <div id="previewPembuka" class="field-placeholder">[Paragraph Pembuka]</div>
                        <br>
                        <div id="previewIsiSurat" class="field-placeholder">[Isi Surat]</div>
                        <br>
                        <div id="previewPenutup" class="field-placeholder">[Penutup Surat]</div>
                    </div>
                    
                    <div class="letter-closing">
                        <div>Hormat kami,</div>
                        <br><br><br>
                        <div id="previewNamaPenulis" class="field-placeholder">[Nama Penulis]</div>
                    </div>
                </div>
            </div>
            <!-- TOMBOL CETAK DIHAPUS DARI SINI -->
        </div>
    </div>

    <script>
        // Set tanggal default ke hari ini
        document.getElementById('tanggal').valueAsDate = new Date();
        
        // Fungsi untuk mengenerate preview surat
        document.getElementById('generateBtn').addEventListener('click', function() {
            generatePreview();
        });
        
        // Fungsi untuk mencetak surat
        document.getElementById('printBtn').addEventListener('click', function() {
            // Generate preview terlebih dahulu sebelum mencetak
            generatePreview();
            
            // Beri jeda sebentar agar preview diperbarui
            setTimeout(() => {
                window.print();
            }, 100);
        });
        
        // Fungsi untuk mereset form
        document.getElementById('resetBtn').addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin mengosongkan semua form?')) {
                document.getElementById('letterForm').reset();
                document.getElementById('tanggal').valueAsDate = new Date();
                
                // Reset preview ke placeholder
                resetPreview();
            }
        });
        
        // Auto-generate preview saat form berubah
        const formInputs = document.querySelectorAll('#letterForm input, #letterForm textarea');
        formInputs.forEach(input => {
            input.addEventListener('input', function() {
                // Auto-update setelah jeda 1 detik
                clearTimeout(window.inputTimeout);
                window.inputTimeout = setTimeout(() => {
                    generatePreview();
                }, 1000);
            });
        });
        
        // Fungsi generate preview
        function generatePreview() {
            // Ambil nilai dari form
            const kota = document.getElementById('kota').value || '[Kota]';
            const tanggal = document.getElementById('tanggal').value || '[Tanggal]';
            const subjek = document.getElementById('subjek').value || '[Subjek Surat]';
            const alamatPenerima = document.getElementById('alamatPenerima').value || '[Alamat Penerima]';
            const pembuka = document.getElementById('pembuka').value || '[Paragraph Pembuka]';
            const isiSurat = document.getElementById('isiSurat').value || '[Isi Surat]';
            const penutup = document.getElementById('penutup').value || '[Penutup Surat]';
            const namaPenulis = document.getElementById('namaPenulis').value || '[Nama Penulis]';
            
            // Format tanggal menjadi teks
            let tanggalText = '[Tanggal]';
            if (tanggal !== '[Tanggal]') {
                const dateObj = new Date(tanggal);
                const options = { day: 'numeric', month: 'long', year: 'numeric' };
                tanggalText = dateObj.toLocaleDateString('id-ID', options);
            }
            
            // Update preview
            document.getElementById('previewKota').textContent = kota;
            document.getElementById('previewKota').className = '';
            
            document.getElementById('previewTanggal').textContent = tanggalText;
            document.getElementById('previewTanggal').className = '';
            
            document.getElementById('previewSubjek').textContent = subjek;
            document.getElementById('previewSubjek').className = '';
            
            // Format alamat penerima dengan line breaks
            const formattedAlamat = alamatPenerima.replace(/\n/g, '<br>');
            document.getElementById('previewAlamatPenerima').innerHTML = formattedAlamat;
            document.getElementById('previewAlamatPenerima').className = '';
            
            document.getElementById('previewPembuka').textContent = pembuka;
            document.getElementById('previewPembuka').className = '';
            
            // Format isi surat dengan line breaks
            const formattedIsi = isiSurat.replace(/\n/g, '<br>');
            document.getElementById('previewIsiSurat').innerHTML = formattedIsi;
            document.getElementById('previewIsiSurat').className = '';
            
            document.getElementById('previewPenutup').textContent = penutup;
            document.getElementById('previewPenutup').className = '';
            
            document.getElementById('previewNamaPenulis').textContent = namaPenulis;
            document.getElementById('previewNamaPenulis').className = '';
        }
        
        // Fungsi reset preview
        function resetPreview() {
            const placeholders = document.querySelectorAll('.field-placeholder');
            placeholders.forEach(element => {
                const id = element.id;
                const placeholderText = id.replace('preview', '');
                
                switch(placeholderText) {
                    case 'Kota':
                        element.textContent = '[Kota]';
                        break;
                    case 'Tanggal':
                        element.textContent = '[Tanggal]';
                        break;
                    case 'Subjek':
                        element.textContent = '[Subjek Surat]';
                        break;
                    case 'AlamatPenerima':
                        element.innerHTML = '[Alamat Penerima]';
                        break;
                    case 'Pembuka':
                        element.textContent = '[Paragraph Pembuka]';
                        break;
                    case 'IsiSurat':
                        element.innerHTML = '[Isi Surat]';
                        break;
                    case 'Penutup':
                        element.textContent = '[Penutup Surat]';
                        break;
                    case 'NamaPenulis':
                        element.textContent = '[Nama Penulis]';
                        break;
                }
                
                element.className = 'field-placeholder';
            });
        }
        
        // Generate preview awal
        generatePreview();
    </script>
</body>
</html>