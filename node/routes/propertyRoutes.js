

const express = require('express')
const router =  express.Router()
const db = require ('../services/database')

//All
router.get('/properties', async (req, res)=>{
    const properties = await db.collection('property').find().toArray()
    res.status(200).json(properties)
})

//Find One
router.get('/properties/:cve_property', async (req, res) => {
    const properties = await db.collection('property').find({"cve_property": parseInt(req.params.cve_property)}).toArray()
    res.status(200).json(properties)
})


//Find status
router.get('/properties/status/:status', async (req, res) => {
    const properties = await db.collection('property').find({"status": req.params.status}).toArray()
    res.status(200).json(properties)
})

//Find type
router.get('/properties/type/:type', async (req, res) => {
    const properties = await db.collection('property').find({"type": req.params.type}).toArray()
    res.status(200).json(properties)
})

//Find type-status
router.get('/properties/type/:type/status/:status', async (req, res) => {
    const properties = await db.collection('property')
                        .find({
                            "type": req.params.type,
                            "status": req.params.status,
                        }).toArray()
    res.status(200).json(properties)
})

//Sort
router.get('/properties/sort/:type', async (req, res) => {
    const sortType = req.params.type.toLowerCase();
    const sortOrder = (sortType === 'asc') ? 1 : -1; //Desc -1 ; Asc 1

    const properties = await db.collection('property')
                               .find()
                               .sort({ price: sortOrder })
                               .toArray();
    res.status(200).json(properties);
});


module.exports = router