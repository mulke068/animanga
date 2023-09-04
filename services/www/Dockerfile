FROM node:18.15.0

WORKDIR /usr/src/www

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build

EXPOSE 3000

CMD ["npm", "start"]

#CMD ["node .output/server/index.mjs"]