var mqtt = require('mqtt');
var sql = require('mssql');

// Konfigurasi koneksi ke SQL Server
var config = {
  user: 'sa',
  password: '123',
  server: 'localhost',
  database: 'prosesdata',
  options: {
    encrypt: false, // Ubah menjadi true jika menggunakan koneksi terenkripsi (SSL/TLS)
  },
};

// Buat koneksi ke SQL Server
sql.connect(config, function (err) {
  if (err) {
    console.error('Error connecting to SQL Server:', err);
    return;
  } else {
    console.log('Connected to SQL Server');
  }
});

// Buat koneksi ke broker MQTT
var client = mqtt.connect('mqtt://192.168.43.239');

// Subscribe ke topik 'Timestamp' saat terhubung ke broker MQTT
client.on('connect', () => {
  client.subscribe('data12309', (err) => {
    if (err) {
      console.error('Error subscribing to MQTT topic:', err);
    }
  });
});

// Mendengarkan pesan yang diterima dari topik 'Timestamp'
client.on('message', function (topic, message) {
  // Parse pesan JSON yang diterima
  const data = JSON.parse(message.toString());

  // Ekstrak nilai dari objek JSON
  const data1 = data.Left1[0];
  const data2 = data.Right1[0];

  // Persiapkan kueri SQL dengan placeholder untuk mencegah SQL injection
  const query = 'INSERT INTO data (data1, data2) VALUES (@data1, @data2)';
  const request = new sql.Request();
  request.input('data1', sql.Int, data1);
  request.input('data2', sql.Int, data2);

  // Eksekusi kueri SQL
  request.query(query, function (err, recordset) {
    if (err) {
      console.error('Error inserting data:', err);
    } else {
      console.log('Data inserted successfully');
    }
  });
});

// Tangani kesalahan koneksi SQL
sql.on('error', function (err) {
  console.error('SQL Server error:', err);
});
