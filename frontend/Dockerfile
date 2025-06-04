FROM node:18

WORKDIR /app

COPY package*.json ./

RUN npm install --no-optional

COPY . .

CMD ["npm", "run", "dev", "--", "--host"]