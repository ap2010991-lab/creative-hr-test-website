# Creative HR Service Website

Premium PHP website for Creative HR Service with recruitment, resume writing, current jobs, contact forms, resume uploads, and a private admin panel.

## Admin Login

- URL: `/admin/login.php`
- Email: `info@creativehr.in`
- Temporary password: `ChangeMe@123`

Change the password after launch by updating `config.php`.

## Hosting Notes

Upload all files to the hosting public directory, usually `public_html`.
Make sure these folders are writable by the server:

- `data`
- `uploads/resumes`

Resume submissions and contact enquiries are saved in `data/*.json`. Resume files are saved in `uploads/resumes`.
