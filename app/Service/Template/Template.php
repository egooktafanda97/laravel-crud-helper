<?php

namespace App\Service\Template;

trait Template
{
    public function getTemplateMigration()
    {
        return [
            /*0*/
            [
                "type" => "unsignedBigInteger",
                "param" => "unsigned,index",
            ],
            /*1*/
            [
                "type" => "string",
                "size" => "200"
            ],
            /*2*/
            [
                "type" => "string",
                "size" => "20",
                "param" => "nullable"
            ],
            /*3*/
            [
                "type" => "string",
                "size" => "200",
                "param" => "nullable"
            ],
            /*4*/
            [
                "type" => "time",
                "param" => "nullable"
            ],
            /*5*/
            [
                "type" => "string",
                "size" => "100",
                "param" => "unique",
            ],
            /*6*/
            [
                "type" => "date",
                "param" => "nullable"
            ],
            /*7*/
            [
                "type" => "unsignedBigInteger",
            ],
            /*8*/
            [
                "type" => "unsignedBigInteger",
                "param" => "nullable"
            ],
            /*9*/
            [
                "type" => "boolean",
                "param" => "default"
            ],
            /*10*/
            [
                "type" => "text",
                "param" => "nullable"
            ],
            /*11*/
            [
                "type" => "string",
                "size" => "100",
                "param" => "nullable,default|0",
            ],
            /*12*/
            [
                "type" => "string",
                "size" => "10",
                "param" => "nullable,default|0",
            ],
            /*13*/
            [
                "type" => "bigInteger",
            ],
            /*14*/
            [
                "type" => "integer",
                "param" => "default|0",
            ],
            /*15*/
            [
                "type" => "longText",
                "param" => "nullable",
            ],
            /*16*/
            [
                "type" => "integer",
                "param" => "nullable",
            ],
            /*17*/
            [
                "type" => "string",
                "size" => "16"
            ],
            /*18*/
            [
                "type" => "string",
                "size" => "16",
                "param" => "unique",
            ],
            /*19*/
            [
                "type" => "unsignedBigInteger",
                "param" => "unique,unsigned,index",
            ],
            /*20*/
            [
                "type" => "boolean",
                "param" => "default|1"
            ],
            /*21*/
            [
                "type" => "string",
                "size" => "16",
                "param" => "unique,nullable",
            ],
            /*22*/
            [
                "type" => "dateTime"
            ],
        ];
    }
    public function getTemplateValidation()
    {
        return [
            /*0*/
            "string|nullable",
            /*1*/
            "nullable|mimes:jpg,png,jpeg,JPG,PNG,JPEG,pdf,PDF,zip,ZIP",
            /*2*/
            "required",
            /*3*/
            "required|unique:users",
            /*4*/
            "required|string|min:6",
            /*5*/
            "required|email|unique:users",
            /*6*/
            "nullable",
            /*7*/
            "integer|nullable",
            /*8*/
            "required|integer",
            /*9*/
            "string|unique:pendaftaran",
            /*10*/
            "nullable|string",
            /*11*/
            "required|string",
            /*12*/
            "required|string|confirmed|min:6",
            /*13*/
            'date|nullable',
            /*14*/
            "required|string|min:16",
            /*15*/
            "required|unique:calon_mahasiswa",
            /*16*/
            "required|unique:orangtua",
            /*17*/
            'required|boolean',
            /*18*/
            "nullable|unique:calon_mahasiswa",
            /*19*/
            "required|mimes:jpg,png,jpeg,ico,JPG,PNG,JPEG",
            /*20*/
            "required|unique:calon_mahasiswa",
            /*21*/
            "required|unique:agent",
        ];
    }
    public function getTemplateMiddelware()
    {
        return [
            /*0*/
            [
                "api",
                "role:super-admin"
            ],
            /*1*/
            [
                "api",
                "role:admin",
                "auth_check"
            ],
            /*2*/
            [
                "api",
                "role:admin-fakultas"
            ],
            /*3*/
            [
                "api",
                "role:admin-prodi"
            ],
            /*4*/
            [
                "api",
                "role:dekan"
            ],
            /*5*/
            [
                "api",
                "role:prodi"
            ],
            /*6*/
            [
                "api",
                "role:staff"
            ],
            /*7*/
            [
                "api",
                "role:dosen"
            ],
            /*8*/
            [
                "api",
                "role:mahasiswa"
            ],
            /*9*/
            [
                "web",
                "role:mahasiswa"
            ],
            /*10*/
            [
                "api",
                "role:admin,super-admin"
            ],
        ];
    }
    public function getTemplateView()
    {
        return  [
            "text" => [
                "type" => "text",
                "modeInput" => "text",
                "attr" => [
                    "required" => true
                ],
                "class" => "",
                "id" => ""
            ],
            "time" => [
                "type" => "time",
                "modeInput" => "text",
                "attr" => [
                    "required" => true
                ],
                "class" => "",
                "id" => ""
            ],
            "select_static" => [
                "type" => "select",
                "modeInput" => "select",
                "attr" => [
                    "required" => true
                ],
                "option" => [
                    "mode" => "static",
                    "value" => [
                        "-" => "",
                        "A" => "A",
                        "B" => "B",
                        "C" => "C"
                    ]
                ],
                "class" => "",
                "id" => ""
            ]
        ];
    }
    public static function gradientAssetColor()
    {
        return [
            ["051937", "A8EB12"],
            ["00ff87", "60efff"],
            ["0061ff", "60efff"],
            ["ff1b6b", "45caff"],
            ["40c9ff", "e81cff"],
            ["ff930f", "fff95b"],
            ["ff0f7b", "f89b29"],
            ["bf0fff", "cbff49"],
            ["696eff", "c6f8ff"],
            ["ff5858", "ffc8c8"],
            ["595cff", "c6f8ff"],
            ["9bafd9", "103783"]
        ];
    }
}
