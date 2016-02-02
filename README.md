README
=========
本網頁程式以「保留作者名字|非商業使用|請勿更改」的方式進行分享，作者名字爲「尹卂|Ejsoon Y」。  

任何問題請發送郵件至

ejsoon@outlook.com(國際)

ejsoon@126.com(中國大陸)

項目介紹
---
* 本系統是目前全世界收錄漢字最多最全的倉頡編碼查詢系統。

* **簡單快捷**是本系統的特色。

* [演示位址](http://ejsoon.jlljxcx.com/ykey)

安裝步驟
---
一，請將connect_db.php中的服務器，用戶名，密碼，數據庫名正確填寫。

二，上傳文檔。

三，在網頁位址欄中輸入http://(..your_site..)/install/create_ykeytable.php，建立倉頡編碼數據庫。成功後會顯示「Table ykeytable created successfully!」。

四，在網頁位址欄中輸入http://(..your_site..)/install/create_logtable.php，建立歷史編碼數據庫。成功後會顯示「Table logtable created successfully!」。

五，在網頁位址欄中輸入http://(..your_site..)/install/insert1.php，將數據寫入倉頡編碼數據庫。該過程視服務器性能，需要等待二到五分鐘的時間。請耐心等待，**勿重覆刷新！**成功後顯示「EC1 is OK」。

六，將上一步的insert1改成insert2，繼續同樣的操作。結束後再改成insert3，直到insert8，一共八次。（因爲每次都要寫入一萬多條，一共有八萬多個編碼。所以本系統是目前爲止收錄漢字最多的倉頡編碼查詢系統。）

七，在網頁位址欄中輸入http://(..your_site..)，試著查一個字的編碼，如果能查到，恭喜你，你成功地把這個世界上最大的倉頡字典安裝到了你的服務器！

注意事項
---
* 如果創建數據庫不成功，請檢查服務器位址，用戶名，密碼，數據庫名是否填寫正確。

* 一些服務端文檔管理有在綫解壓的功能，可在步驟二上傳之前壓縮，上傳之後再解壓。
二，將

