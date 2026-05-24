import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Aplikasi Katalog Minuman',
      theme: ThemeData(
        primarySwatch: Colors.teal,
        useMaterial3: true,
      ),
      home: const HomeScreen(),
    );
  }
}

// ==========================================
// 1. MODEL DATA (Untuk Menyimpan Info Item)
// ==========================================
class ItemMinuman {
  final String judul;
  final String deskripsiSingkat;
  final String deskripsiLengkap;
  final String urlGambar;

  ItemMinuman({
    required this.judul,
    required this.deskripsiSingkat,
    required this.deskripsiLengkap,
    required this.urlGambar,
  });
}

// Data Dummy untuk isi ListView
final List<ItemMinuman> daftarMinuman = [
  ItemMinuman(
    judul: 'Roasted Milk Tea',
    deskripsiSingkat: 'Teh susu panggang dengan aroma smoky yang khas.',
    deskripsiLengkap: 'Roasted Milk Tea kami dibuat dari daun teh pilihan yang dipanggang secara perlahan untuk mengeluarkan aroma smoky yang kaya, kemudian dipadukan dengan susu creamy yang pas. Sangat cocok dinikmati di siang hari yang terik bersama topping kriuk jelly atau nata de coco.',
    urlGambar: 'https://images.unsplash.com/photo-1541658016709-82535e94bc69?w=500',
  ),
  ItemMinuman(
    judul: 'Java Green Tea',
    deskripsiSingkat: 'Teh hijau asli dengan sejuta kesegaran alami.',
    deskripsiLengkap: 'Seduhan murni dari daun teh hijau premium yang dipetik langsung dari perkebunan lokal di Jawa Barat. Kaya akan antioksidan, disajikan dingin dengan tingkat kemanisan yang bisa kamu sesuaikan sendiri.',
    urlGambar: 'https://images.unsplash.com/photo-1627435601361-ec25f5b1d0e5?w=500',
  ),
  ItemMinuman(
    judul: 'Lemon Tea Crisp',
    deskripsiSingkat: 'Perpaduan teh hitam mantap dan perasan lemon asli.',
    deskripsiLengkap: 'Kombinasi klasik yang tidak pernah salah antara teh hitam pekat berkualitas tinggi dengan perasan jeruk lemon segar. Menghasilkan rasa asam-manis seimbang yang instan mengembalikan semangat kerjamu.',
    urlGambar: 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?w=500',
  ),
];

// ==========================================
// 2. TAMPILAN UTAMA / HOME SCREEN
// ==========================================
class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  // Controller untuk mengambil text dari Form TextField
  final TextEditingController _textController = TextEditingController();

  @override
  void dispose() {
    _textController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Katalog Tealkom', style: TextStyle(fontWeight: FontWeight.bold)),
        backgroundColor: Colors.teal,
        foregroundColor: Colors.white,
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // Judul Bagian List
            const Padding(
              padding: EdgeInsets.all(16.0),
              child: Text(
                'Menu Minuman Tersedia',
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
            ),

            // FITUR: LISTVIEW (Menampilkan Daftar Minuman)
            ListView.builder(
              shrinkWrap: true, // Agar ListView bisa bersanding di dalam Column & SingleChildScrollView
              physics: const NeverScrollableScrollPhysics(), // Scroll utama dihandle oleh SingleChildScrollView
              itemCount: daftarMinuman.length,
              itemBuilder: (context, index) {
                final minuman = daftarMinuman[index];
                
                return Card(
                  margin: const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
                  child: InkWell(
                    borderRadius: BorderRadius.circular(8),
                    // FITUR: NAVIGASI (Pindah halaman saat item di-klik)
                    onTap: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => DetailScreen(minuman: minuman),
                        ),
                      );
                    },
                    child: Padding(
                      padding: const EdgeInsets.all(12.0),
                      // FITUR: ROW (Menyusun gambar di kiri dan teks di kanan)
                      child: Row(
                        children: [
                          // FITUR: CONTAINER (Untuk mengatur dekorasi & ukuran gambar)
                          Container(
                            width: 80,
                            height: 80,
                            decoration: BoxDecoration(
                              borderRadius: BorderRadius.circular(8),
                              image: DecorationImage(
                                image: NetworkImage(minuman.urlGambar),
                                fit: BoxFit.cover,
                              ),
                            ),
                          ),
                          const SizedBox(width: 16),
                          // FITUR: COLUMN (Menumpuk Judul dan Deskripsi secara Vertikal)
                          Expanded(
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                Text(
                                  minuman.judul,
                                  style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                                ),
                                const SizedBox(height: 6),
                                Text(
                                  minuman.deskripsiSingkat,
                                  style: TextStyle(fontSize: 13, color: Colors.grey[600]),
                                  maxLines: 2,
                                  overflow: TextOverflow.ellipsis,
                                ),
                              ],
                            ),
                          ),
                          const Icon(Icons.arrow_forward_ios, size: 16, color: Colors.grey),
                        ],
                      ),
                    ),
                  ),
                );
              },
            ),

            const Padding(
              padding: EdgeInsets.symmetric(horizontal: 16, vertical: 8),
              child: Divider(thickness: 1),
            ),

            // FITUR: FORM SEDERHANA
            Padding(
              padding: const EdgeInsets.all(16.0),
              child: Container(
                padding: const EdgeInsets.all(16),
                decoration: BoxDecoration(
                  color: Colors.teal.withOpacity(0.05),
                  borderRadius: BorderRadius.circular(12),
                ),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Text(
                      'Form Saran / Pesan Khusus',
                      style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: Colors.teal),
                    ),
                    const SizedBox(height: 12),
                    // FITUR: TEXTFIELD
                    TextField(
                      controller: _textController,
                      decoration: const InputDecoration(
                        labelText: 'Masukkan saran atau ulasan kamu',
                        border: OutlineInputBorder(),
                        hintText: 'Contoh: Tambah topping boba dong...',
                      ),
                    ),
                    const SizedBox(height: 12),
                    // FITUR: BUTTON
                    SizedBox(
                      width: double.infinity,
                      child: ElevatedButton(
                        style: ElevatedButton.styleFrom(
                          backgroundColor: Colors.teal,
                          foregroundColor: Colors.white,
                        ),
                        onPressed: () {
                          String inputUser = _textController.text.trim();

                          if (inputUser.isEmpty) {
                            // FITUR tambahan: Menampilkan Alert Dialog jika kosong
                            showDialog(
                              context: context,
                              builder: (context) => AlertDialog(
                                title: const Text('Gagal'),
                                content: const Text('Form tidak boleh kosong. Harap isi ulasan terlebih dahulu!'),
                                actions: [
                                  TextButton(
                                    onPressed: () => Navigator.pop(context),
                                    child: const Text('OK'),
                                  )
                                ],
                              ),
                            );
                          } else {
                            // FITUR: MENAMPILKAN SNACKBAR saat tombol ditekan sukses
                            ScaffoldMessenger.of(context).showSnackBar(
                              SnackBar(
                                content: Text('Saran terkirim: "$inputUser"'),
                                backgroundColor: Colors.teal,
                                duration: const Duration(seconds: 3),
                              ),
                            );
                            _textController.clear(); // Hapus teks di input setelah terkirim
                          }
                        },
                        child: const Text('Kirim Pesan'),
                      ),
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}

// ==========================================
// 3. TAMPILAN DETAIL SCREEN
// ==========================================
class DetailScreen extends StatelessWidget {
  final ItemMinuman minuman;

  // Menerima data dari halaman utama melalui constructor
  const DetailScreen({super.key, required this.minuman});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(minuman.judul),
        backgroundColor: Colors.teal,
        foregroundColor: Colors.white,
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // Menampilkan Gambar Besar di bagian atas detail
            Image.network(
              minuman.urlGambar,
              width: double.infinity,
              height: 250,
              fit: BoxFit.cover,
            ),
            Padding(
              padding: const EdgeInsets.all(16.0),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  // Judul Minuman
                  Text(
                    minuman.judul,
                    style: const TextStyle(fontSize: 24, fontWeight: FontWeight.bold, color: Colors.teal),
                  ),
                  const SizedBox(height: 6),
                  // Deskripsi singkat (Ciri khas)
                  Text(
                    minuman.deskripsiSingkat,
                    style: TextStyle(fontSize: 16, fontStyle: FontStyle.italic, color: Colors.grey[600]),
                  ),
                  const SizedBox(height: 16),
                  const Text(
                    'Detail Menu:',
                    style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold),
                  ),
                  const SizedBox(height: 6),
                  // Deskripsi Panjang
                  Text(
                    minuman.deskripsiLengkap,
                    style: const TextStyle(fontSize: 15, height: 1.5),
                  ),
                  const SizedBox(height: 30),
                  // Tombol Manual Kembali (Menggunakan Navigator.pop)
                  SizedBox(
                    width: double.infinity,
                    child: OutlinedButton(
                      style: OutlinedButton.styleFrom(
                        side: const BorderSide(color: Colors.teal),
                        foregroundColor: Colors.teal,
                      ),
                      onPressed: () {
                        Navigator.pop(context);
                      },
                      child: const Text('Kembali ke Daftar Menu'),
                    ),
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}