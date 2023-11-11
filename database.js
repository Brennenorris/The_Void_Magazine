const mysql = require('mysql');

const connection = mysql.createConnection({
  host: '127.0.0.1:3306',
  user: 'root',
  password: 'sesJOc-kIlmN',
  database: 'TempVoidDatabase'
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to database:', err);
    return;
  }
  console.log('Connected to the database');
});

console.log('interaction_id')
console.log('user_id')
console.log('uinteraction_type')
console.log('interaction_timestamp')
// Close the database connection
connection.end();
