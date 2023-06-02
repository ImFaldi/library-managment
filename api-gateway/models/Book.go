package models

// Book is a model for book table
type Book struct {
	ID       uint   `json:"id" gorm:"primary_key"`
	Title    string `json:"title"`
	Category int    `json:"category_id"`
	Author   int    `json:"autho_id"`
	Status   string `json:"status"`
	Year     string `json:"year"`
}
