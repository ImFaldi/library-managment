package models

import (
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

var DB *gorm.DB

func ConnectDatabase() {
	database, err := gorm.Open(mysql.Open("root:@tcp(localhost:3306)/managment-library"), &gorm.Config{})
	if err != nil {
		panic("Failed to connect to database!")
	}

	DB = database
}
