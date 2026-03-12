# webuseorg-docker

## Описание

Запуск проекта «Учет оргтехники» (версия 1.05) от Павла Грибова в Docker.

---

## Установка

- Прописываем переменные окружения в файле .env
- Собираем и запускаем контейнеры

```bash
docker compose up -d
```

или

```bash
docker compose -f docker-compose.build.yml up -d --build
```

- Запускаем процесс установки по адресу http://localhost:8080/install

---

## Ссылки

[Веб-сайт автора исходного проекта (https://грибовы.рф/)](https://грибовы.рф/)

- Исходный проект на sourceforge.net

https://sourceforge.net/projects/webuseorg/files/public_1.05.tar/download