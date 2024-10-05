const express = require('express')
require('dotenv').config()
const cors = require('cors');


const conatctRoutes = require ('./routes/contactRoutes')
const propietyRoutes = require ('./routes/propertyRoutes')
const usersRoutes = require ('./routes/userRoutes')



const api_prefix = process.env.API_PREFIX
const app = express()
app.use(cors());
app.use(express.json())

app.use(`${api_prefix}`, conatctRoutes)
app.use(`${api_prefix}`, propietyRoutes)
app.use(`${api_prefix}`, usersRoutes)
const port = process.env.APP_PORT


app.listen(port, () => {
    console.log(`Example app listening on port ${port}!`)
})

