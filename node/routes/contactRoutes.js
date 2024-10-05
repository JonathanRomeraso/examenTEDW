const express = require('express')
const nodemailer = require('nodemailer');
const router =  express.Router()
const db = require ('../services/database')

// Insertar conatcto
router.post('/properties/contact', async (req, res) => {
    try {
        const contacto = req.body;
        const resultado = await db.collection('contact').insertOne(contacto);

        sendEmailToAdmin(contacto);
        res.status(201).json({ message: 'Mensaje Enviado'});

    } catch (error) {
        res.status(500).json({ error: 'Error al enviar mensaje' });
    }
});

async function sendEmailToAdmin(contacto) {
    let transporter = nodemailer.createTransport({
        service: 'gmail', // Cambia esto según tu servicio de correo
        auth: {
            user: 'amely2736@gmail.com', // Tu correo
            pass: 'nvcmnknxhpuayfgc' // Tu contraseña
        }
    });

    let mailOptions = {
        from: 'homeland@gmail.com',
        to: '21030021@itcelaya.edu.mx',
        subject: `Nuevo mensaje de contacto: ${contacto.subject}`,
        html: `
            <h1>Nuevo mensaje de contacto</h1>
            <p><strong>Nombre: </strong> ${contacto.fullname}</p>
            <p><strong>Email: </strong> ${contacto.email}</p>
            <p><strong>Mensaje: </strong><br>${contacto.message}</p>
        `
    };

    try {
        await transporter.sendMail(mailOptions);
    } catch (error) {
        console.error('Error al enviar el correo:', error);
    }
    
}
module.exports = router