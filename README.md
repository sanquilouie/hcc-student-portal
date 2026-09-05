# HCC Student Portal

A sanitized public edition of a legacy PHP student portal project. The original application brings student records, staff administration, enrollment, grades, billing, announcements, and scheduling into a role-oriented web interface, with additional JSON endpoints.

## Historical work and publication scope

This edition preserves the original project's architecture, coding style, workflows, dependencies, security weaknesses, and known defects. It is not the later rewritten or hardened edition.

Private records, historical credentials, personal photographs, and identifying metadata were removed or replaced solely for publication. The only PHP source edits are environment-variable substitutions at three existing database configuration points and the two shared registration-password assignments. No authentication, authorization, API, SQL-query, session, upload, or UI redesign was performed.

**This is not production-ready software. Do not deploy it with real personal information, real school accounts, or production credentials. Source publication is not approval for an internet-facing deployment.**

## Original application areas

- Admin: student/staff records, registration, subjects, announcements, logs, and spreadsheet imports.
- Registrar: enrollment records and spreadsheet imports.
- Faculty: student/subject views, grades, profile, and schedules.
- Cashier: billing imports, views, and edits.
- Scheduler: class scheduling, maintenance screens, and printable reports.
- Student: profile, grades, billing, schedules, and announcements.
- Parent-related JSON endpoints: account and linked-student data paths in the API.

These describe the code's intended areas, not a claim that every workflow is functional or securely authorized. Original role checks and defects remain.

## Original technology

- Procedural PHP and MySQLi; MySQL-style SQL dumps.
- HTML/CSS, Bootstrap, jQuery, DataTables, Select2, and AdminLTE-era scheduling assets.
- PhpSpreadsheet, Composer metadata, and the original bundled dependencies.

Third-party library licenses, notices, and existing attribution comments are retained. The repository does not claim authorship of bundled libraries or attributed components.

## Configuration for isolated local investigation

1. Use a disposable local environment and database containing only fictional information. Do not connect to an original or production database.
2. Inspect `composer.json` and `composer.lock` when selecting a compatible PHP runtime. Dependencies have intentionally not been upgraded. The original `vendor/` tree is retained. If dependency restoration is necessary, use the lock file rather than an unconstrained update; do not bypass advisory checks merely to run the project.
3. Set the seven variables documented in `.env.example` in the environment inherited by the PHP process. Use new local-only values for the password/key variables.
4. `.env.example` is a reference template, **not an automatic dotenv loader**. Creating `.env` alone will not configure the application. Any local `.env` must remain ignored and must not be HTTP-accessible.
5. Treat the supplied SQL files as historical schema references with sanitized data, not as a complete installation or migration system. Import only into a disposable database after inspecting the statements and their original engine/encoding assumptions.
6. Do not expose the project root to the internet. If investigating it locally, the web-server configuration must deny access to private configuration, Git files, SQL dumps, and other non-public material. No production deployment configuration is supplied.

The original secondary development configurations in `configgg.php` and `admin/include/dbcon.php` are unchanged. They contain their original local development defaults, not the removed nonempty credential. Their separate behavior is intentionally preserved.

| Variable | Existing consumer |
| --- | --- |
| `DB_HOST`, `DB_USER`, `DB_PASSWORD`, `DB_NAME` | `config.php`, `admin/schedule/dist/includes/dbcon.php`, `api/connector.php` |
| `SECRET_KEY` | The existing constant in `api/connector.php` |
| `DEFAULT_STAFF_PASSWORD` | The existing staff registration MD5 assignment |
| `DEFAULT_STUDENT_PASSWORD` | The existing student registration MD5 assignment |

All variables must be configured deliberately before use. No historical secret is retained as a fallback. Moving the `SECRET_KEY` value does not fix the original mechanism's missing validation. Moving the registration values does not remove the original shared-default behavior or replace MD5.

## Sanitized SQL and workbook fixtures

- `students.sql`: original table definitions, indexes, engines, and schema statements retained; record INSERTs omitted. No historical student, faculty, billing, grade, or account records remain in this dump.
- `admin/schedule/dist/db/scheduling.sql`: original schema and nonsensitive lookup records retained; personnel, account credential markers, and schedule assignments are fictional. Subject ownership references point to the synthetic personnel.
- `assets/testfiles/egstudents.xlsx`: seven fictional student rows, original 12-column layout.
- `assets/testfiles/egbilling.xlsx`: 192 fictional billing rows, original 15-column layout.
- `assets/testfiles/eggrades.xlsx`: three fictional grade rows, original 14-column layout.
- `assets/testfiles/egenrollees.xlsx`: four fictional enrollment rows, original five-column layout.

The workbook headers, order, row counts, and import layouts are preserved. Identifying creator/editor metadata and Excel lock files are removed. Fixtures use clearly fictional identities and reserved `example.invalid` email addresses. Credential strings in fixtures are explicit fictional placeholders, not historical passwords or credentials to reuse. This edition does not provision working demo accounts or add a new account-creation script.

The identified private photographs (including a duplicate copy) and the image containing identifiable children/location metadata were replaced at their existing paths with the project's existing neutral background asset. The retained cartoon avatar and background image have identifying social-upload/author/account metadata removed without changing their pixels. Other artwork, library assets, directory structure, and attribution remain unchanged.

## Known limitations intentionally retained

- Student login does not meaningfully verify the supplied password in the original Student branch.
- MD5 and legacy plaintext/deterministic password behavior remain in the original account paths.
- The `secret_key` request field is not a substitute for meaningful API authorization.
- Original API responses can expose password fields; authorization, sessions, CSRF handling, and request validation have not been hardened.
- Original SQL interpolation and upload/import weaknesses remain.
- Destructive setup/debug endpoints remain, including `api/setup.php`; do not invoke them against anything valuable.
- The supplied dumps do not fully match all application queries. Examples include missing `logs`, `_parents`, and `profile_images` tables. Missing schema elements, includes, and other defects have not been reconstructed or fixed.
- Legacy scheduling code and multiple front-end library generations remain. Dependencies may have known vulnerabilities and have not been modernized for this publication pass.
- No complete runtime regression pass or successful end-to-end setup is claimed for this minimally sanitized edition. Results from a different hardened copy do not apply to it.

The publication checks establish removal of the identified private material and preservation of the original source outside the disclosed substitutions. They are not a security certification or a production-readiness assessment.
