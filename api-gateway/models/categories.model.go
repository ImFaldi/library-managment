package models

type Category struct {
	ID    uint   `json:"id" gorm:"primaryKey"`
	Title string `json:"title"`
}
