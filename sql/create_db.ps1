# create_db.ps1 - Criar banco de dados SAGAZ MOTORS
$mysql = "C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe"
$user = "root"
$pass = "root123"
$sqlFile = "C:\Users\salle\.hermes\projects\sagaz\sql\sagaz_motors.sql"

Write-Host "Criando banco de dados..." -ForegroundColor Cyan

# Criar banco
cmd /c "$mysql -u $user -p$pass -e `"CREATE DATABASE IF NOT EXISTS sagaz_motors CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`""

Write-Host "Executando script SQL..." -ForegroundColor Cyan

# Executar script via pipe
Get-Content $sqlFile | cmd /c "$mysql -u $user -p$pass sagaz_motors"

Write-Host ""
Write-Host "Verificando..." -ForegroundColor Cyan
cmd /c "$mysql -u $user -p$pass -e `"USE sagaz_motors; SELECT COUNT(*) as Modelos FROM modelos; SELECT COUNT(*) as Categorias FROM categorias;`""

Write-Host ""
Write-Host "Concluido!" -ForegroundColor Green
