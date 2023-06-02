package models

type Borrow struct {
	ID          uint   `json:"id" gorm:"primary_key"`
	User_id     uint   `json:"user_id"`
	Book_id     uint   `json:"book_id"`
	Borrow_date string `json:"borrow_date"`
	Return_date string `json:"return_date"`
	Status      string `json:"status"`
	Penalty     int    `json:"penalty"`
}
