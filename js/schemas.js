const joi = require("joi");


const countyCodes = Array.from({length: 47}, (_,i) => String(i+1).padStart(3,"0"));


const patientSchema = joi.object({
    patientID: 
    joi.string().required().min(1).max(9999999999).messages({
        "string.empty" : "Patient ID required"
    }),

    firstName:
    joi.string().required().min(2).max(100).messages({
        "string.empty" : "First name required"
    }),

    lastName:
    joi.string().required().min(2).max(100).messages({
        "string.empty" : "Last name required"
    }),
    
    surname:
    joi.string().required().min(2).max(100).messages({
        "string.empty" : "Surname required"
    }),
    
    dob:
    joi.date().required().greater('1-1-1900').less('1-1-2006').messages({
        "date.base" : "Enter valid date",
        "date.less" : "Must be 18 years or older"
    }),

    gender:
    joi.string().required().valid("Male","Female","Bi-sexual").messages({
        "string.invalid" : "Invalid option selected",
    }),

    county:
    joi.string().required().valid(...countyCodes).messages({
        "string.invalid" : "Invalid option selected",
    })
});


const nextOfKinSchema = joi.object({
    patientID: 
    joi.string().required().min(1).max(9999999999).messages({
        "string.empty" : "Patient ID required"
    }),

    firstName:
    joi.string().required().min(2).max(100).messages({
        "string.empty" : "First name required"
    }),

    lastName:
    joi.string().required().min(2).max(100).messages({
        "string.empty" : "Last name required"
    }),
    
    surname:
    joi.string().required().min(2).max(100).messages({
        "string.empty" : "Surname required"
    }),
});


module.exports = {
    patientSchema,
    nextOfKinSchema
};
