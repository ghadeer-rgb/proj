

const express = require("express");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
const sql = require("mssql");
const cors = require("cors");

const app = express();
app.use(cors());
app.use(express.json());

const sqlConfig = {
  user: 'your_user',
  password: 'your_password',
  database: 'your_db',
  server: 'your_server',
  options: { encrypt: true, trustServerCertificate: true }
};

app.post("/login", async (req, res) => {
  const { email, password } = req.body;

  try {
    await sql.connect(sqlConfig);
    const result = await sql.query`SELECT * FROM Users WHERE email = ${email}`;

    if (result.recordset.length === 0) {
      return res.status(400).json({ message: "User not found" });
    }

    const user = result.recordset[0];
    const match = await bcrypt.compare(password, user.passwordHash);

    if (!match) {
      return res.status(400).json({ message: "Incorrect password" });
    }

    const token = jwt.sign({ id: user.id, email: user.email }, "secret123", { expiresIn: "1h" });
    res.json({ token });
  } catch (err) {
    console.error(err);
    res.status(500).send("Server error");
  }
});

app.listen(3000, () => console.log("Server running on port 3000"));