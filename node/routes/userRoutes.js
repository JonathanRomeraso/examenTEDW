const express = require('express')
const router =  express.Router()
const db = require ('../services/database')

// Insertar conatcto
router.post('/properties/user', async (req, res) => {
    try {
        const contacto = req.body;
        const resultado = await db.collection('user').insertOne(contacto);
        res.status(201).json({ message: 'Usuario Almacenado'});
    } catch (error) {
        res.status(500).json({ error: 'Usuario no almacenado' });
    }
});

module.exports = router