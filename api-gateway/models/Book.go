package models

import (
	"gorm.io/gorm"
)

// Book is a model for book table
type Book struct {
	gorm.Model
	Title    string `json:"title"`
	Category int    `json:"category_id"`
	Author   int    `json:"author"`
	Status   string `json:"status"`
	Year     string `json:"year"`
}
