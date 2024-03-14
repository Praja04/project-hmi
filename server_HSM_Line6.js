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
  client.subscribe('data12309', (err) => {
    if (err) {
      console.error('Error subscribing to MQTT topic:', err);
    }
  });
});

client.on('message', function (topic, message) {
  // Parse the incoming JSON message
  const data = JSON.parse(message.toString());

  // Extract values from the JSON object
  let data1 = data.L6_HSM1_TEMP_LEFT[0];
  let data2 = data.L6_HSM1_TEMP_RIGHT[0];
  let data3 = data.L6_HSM1_TEMP_SET_VALUE[0];
  let data4 = data.L6_HSM1_LID_HOLDER_ACTUAL_POS[0];
  let data5 = data.L6_HSM1_LID_HOLDER_WAITING_POS[0];
  let data6 = data.L6_HSM1_LID_HOLDER_HOLDING_POS[0];
  let data7 = data.L6_HSM1_LID_HOLDER_MELTING_POS[0];
  let data8 = data.L6_HSM1_LID_HOLDER_SEALING_POS[0];
  let data9 = data.L6_HSM1_BOX_LIFTER_ACTUAL_POS[0];
  let data10 = data.L6_HSM1_BOX_LIFTER_WAITING_POS[0];
  let data11 = data.L6_HSM1_BOX_LIFTER_MELTING_POS[0];
  let data12 = data.L6_HSM1_BOX_LIFTER_SEALING_POS[0];
  let data13 = data.L6_HSM1_BOX_LIFTER_FEEDING_POS[0];
  let data14 = data.L6_HSM1_MIRROR_ACTUAL_POS[0];
  let data15 = data.L6_HSM1_MIRROR_WAITING_POS[0];
  let data16 = data.L6_HSM1_MIRROR_MELTING_POS[0];
  let data17 = data.L6_HSM1_UPPER_LIMIT_TEMP[0];
  let data18 = data.L6_HSM1_LOWER_LIMIT_TEMP[0];
  let data19 = data.L6_HSM1_TYPE_BATTERY[0];
  let data20 = data.L6_HSM1_LID_MELTING_TIME[0];
  let data21 = data.L6_HSM1_BOX_LIFTER_MELTING[0];
  let data22 = data.L6_HSM1_TYPE_SEALING_TIME[0];
  data1 = data1 / 10;
  data2 = data2 / 10;
  data3 = data3 / 10;
  data4 = data4 / 10;
  data5 = data5 / 10;
  data6 = data6 / 10;
  data7 = data7 / 10;
  data8 = data8 / 10;
  data9 = data9 / 10;
  data10 = data10 / 10;
  data11 = data11 / 10;
  data12 = data12 / 10;
  data13 = data13 / 10;
  data14 = data14 / 10;
  data15 = data15 / 10;
  data16 = data16 / 10;
  data17 = data17 / 10;
  data18 = data18 / 10;


  // Prepare the SQL query with placeholders to prevent SQL injection
  const query = 'INSERT INTO data (L6_HSM1_TEMP_LEFT, L6_HSM1_TEMP_RIGHT , L6_HSM1_TEMP_SET_VALUE,L6_HSM1_LID_HOLDER_ACTUAL_POS, L6_HSM1_LID_HOLDER_WAITING_POS, L6_HSM1_LID_HOLDER_HOLDING_POS, L6_HSM1_LID_HOLDER_MELTING_POS, L6_HSM1_LID_HOLDER_SEALING_POS, L6_HSM1_BOX_LIFTER_ACTUAL_POS , L6_HSM1_BOX_LIFTER_WAITING_POS, L6_HSM1_BOX_LIFTER_MELTING_POS, L6_HSM1_BOX_LIFTER_SEALING_POS, L6_HSM1_BOX_LIFTER_FEEDING_POS,L6_HSM1_MIRROR_ACTUAL_POS, L6_HSM1_MIRROR_WAITING_POS , L6_HSM1_MIRROR_MELTING_POS, L6_HSM1_UPPER_LIMIT_TEMP,L6_HSM1_LOWER_LIMIT_TEMP,TYPE, L6_HSM1_LID_MELTING_TIME,L6_HSM1_BOX_LIFTER_MELTING, L6_HSM1_TYPE_SEALING_TIME ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
  const values = [data1, data2, data3, data4, data5, data6, data7, data8, data9, data10, data11, data12, data13, data14, data15, data16,data17, data18, data19, data20, data21, data22];

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


