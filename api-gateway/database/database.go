package database

import (
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

var DB *gorm.DB

func DatabaseInit() {

	database, err := gorm.Open(mysql.Open("root:@tcp(localhost:3306)/managment-library?charset=utf8&parseTime=True&loc=Local"), &gorm.Config{})
	if err != nil {
		panic("failed to connect database")
	}

	DB = database
}
