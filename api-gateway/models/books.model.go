package models

type Book struct {
	ID          uint     `json:"id" gorm:"primaryKey"`
	Title       string   `json:"title"`
	Category_id uint     `json:"category_id"`
	Category    Category `json:"category"`
	Author_id   uint     `json:"author_id"`
	Author      Author   `json:"author"`
	Stock       uint     `json:"stock"`
	Year        uint     `json:"year"`
}
