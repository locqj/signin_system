# signin_system

## 用戶需求
1. 指定時間打卡，滿足在一定時間範圍內，尚算打卡成功
2. 歷史打卡記錄數據統計，可視化展示
3. 有記錄最長連續打卡的功能
4. 有打卡激勵功能，達成成就，獎勵，成就階梯性
5. 定時短信提醒任務，系統可配置
6. 用戶達成成就，管理員可以收到郵件提示（或短信）
7. 打卡成功選填心情（一般，不錯， 很棒）， 標籤選填讀物類型，打卡成功，需要拍照做記錄，尚算打卡成功
8. UI（要美！哎）



## 目錄結構

### 總體結構

```
├── code 代碼
├── db 數據庫歷史版本
└── docs 文檔，數據庫設計圖
```



## 項目部署
1. git clone https://github.com/locqj/signin_system.git
2. cd signin_system/code/signin_system
3. cp .env.example .env
4. php artisan key:generate 生成laravel key
5. 打開.env配置相應數據庫等信息
6. composer install
7. npm（cnpm， yarm） install
8. chmod -R 755 stroage bootstrap
9. cd ../db mysql -u xxx -p dbname < xxx.sql
9. php artisan serve