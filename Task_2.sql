/**
 * @author denistouch <denistouch@gmail.com>
 * @version 1.0a
 */
SELECT users.login FROM users
        LEFT JOIN objects ON users.object_id=objects.id
        WHERE users.object_id = objects.id