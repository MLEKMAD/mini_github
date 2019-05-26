
const express = require('express');
const app=expres();
const upload =require("express-fileupload");
app.use(upload())
const router = express.Router();
const http=require('http').Server(app).listen(3000);
app.get("/",function(req,res){
    res.sendFile(__dirname+'//*SMIYA NTAA FIN KAYNA form*/');
})
app.post("/",function(req,res){
    if(req.files){
        const file=req.files.filename,
            filename=file.name;
            file.mv("./"+filename,function(err){
                if(err){
                    console.log(err);
                    res.send('error occured')
                }
                else{
                    res.send("done!")
                }
            })
    }
})

 