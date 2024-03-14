var mqtt = require('mqtt')
var client = mqtt.connect('mqtt://10.0.0.237')
//var client = mqtt.connect('mqtt://192.168.43.239')
var mysql = require('mysql');
var connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'project-cbi'
});

connection.connect(console.log("Connecting to project HSM LINE 6 HEAD 1"));



// Subscribe ke topik 'Timestamp' saat terhubung ke broker MQTT
client.on('connect', () => {
  client.subscribe('data321', (err) => {
    if (err) {
      console.error('Error subscribing to MQTT topic:', err);
    }
  });
});

client.on('message', function (topic, message) {
  // Parse the incoming JSON message
  const data = JSON.parse(message.toString());

  // Extract values from the JSON object
  let data1 = data.upper[0];
  let data2 = data.lower[0];
 

  // Prepare the SQL query with placeholders to prevent SQL injection
  const query = 'INSERT INTO awa (data1, data2) VALUES (?,?)';
  const values = [data1,data2];

  // Execute the query
  connection.query(query, values, function (error, results, fields) {
    if (error) {
      console.error('Error inserting data:', error);
    } else {
      console.log('Data inserted successfully');
    }


  });
  // Close the MySQL connection when done 
  // connection.end(); tidak perlu untuk saat ini
});


