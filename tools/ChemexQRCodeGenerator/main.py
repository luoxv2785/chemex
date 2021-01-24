# coding:utf8
import qrcode
from PIL import Image
import os
import sys

is_file_exist = os.path.exists('input.txt')

if not is_file_exist:
    print('文件不存在，请确认input.txt位置处于当前程序根目录中')
    input('按回车退出')
    sys.exit()

# 初始化一个列表用于存放txt文件读取的内容
items = []

# 读取txt文件
file = open("input.txt", "r")

# 按行读取后将每行的内容加入到列表中
for line in file.readlines():
    items.append(line.strip('\n'))

# 处理列表中的每一项
for item in items:
    # 获取前缀
    item_type = item.split(':')[0]
    # 获取后缀
    item_id = item.split(':')[1]

    # 判断目录是否存在
    is_exist = os.path.exists(item_type)
    # 如果不在
    if not is_exist:
        # 创建目录（以前缀命名）
        os.makedirs(item_type)

    # 生成二维码
    code = qrcode.make(item)
    # 保存为文件
    with open(item_type + '/' + item_id + '.png', 'wb') as f:
        code.save(f)

print('二维码文件生成成功')
input('按回车退出')
