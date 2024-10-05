const MongoClient = require('mongodb').MongoClient

require('dotenv').config()
var db = null
//const CONN_STRING='mongodb+srv://21030021:YGf4STxgBaBMK8Da@topicosweb.jsatq.mongodb.net/';
try {
    const client = new MongoClient(process.env.CONN_STRING)
    client.connect()
    db = client.db(process.env.DB_NAME)
    console.log("Connection successfully...")
} catch (error) {
    console.log(error)
}
    

module.exports = db
